<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Event_schedule;
use App\Models\Event_category;
use App\Models\Event_time;
use App\Models\Vendor;
use App\Models\EventClass;
use App\Models\Ticket;
use GuzzleHttp\Client;
use App\Exports\Event_download;
use Excel;
use DB;




use Illuminate\Support\Facades\Auth;
use Validator, DataTables;

class EventController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');       
    }
    public function index()
    {   
        // $event = Event::with('event_category', 'event_schedule')->get();
        $event = Event::select('id', 'name')->get();
        return view('dashboard.event.index', compact( 'event' ));
    }

    public function indexData(Request $request){
        if($request->ajax()){
        $data = Event::all();      
        if (!empty ($request->get('event')) ){
            $data = $data->where('id', $request->get('event'));
            
        }
        if (!empty ($request->get('status')) || ($request->get('status') == "0") ){
            $data = $data->where('status', $request->get('status'));
            
        }
        // return json_encode($data);
            
        return Datatables::of($data)
               
                ->editColumn('action', function($data){ return view('dashboard.event.index-action', compact('data'));})
                ->editColumn('status', function($data){ 
                    if($data->status == 1){
                    return '<small class="bg-warning text-white text-nowrap py-1 px-3 text-center radius-5 d-block">Active</small>';
                    }else{
                    return '<small class="bg-secondary text-white text-nowrap py-1 px-3 text-center radius-5 d-block">Disabled</small>';
                    }
                    })
                ->rawColumns(['action', 'status'])
                ->make(true); 
            }else  {
            flash('WARNING')->warning();
            return redirect('/event');
            }
    

    }

    public function detail($id)
    {
        // $event = Event::find($id);
        // // dd($user['device_p2p']->count());
        // if(empty($event))  {
        //     flash('Empty record.')->error();
        //     return redirect('/event');
        // } 
        // return view('dashboard.event.detail', ['event' => $event]);


        $data = Event::with('event_category', 'event_schedule.ticket.event_class','event_schedule.ticket.event_time', 'event_time', 'vendor')->find($id);
        // $data = Event::with('vendor')->find($id);
        $event_category = Event_category::all();
        $vendor = Vendor::with('user')->orderByRaw('id DESC')->whereHas('user')->get();
        $event_class = EventClass::where('user_id', $data->vendor->user_id )->get();
        // return json_encode($data);
        $file = config()->get('app.backend_image')."/uploads/images/events/poster/". $data->image;
        $file2 = config()->get('app.backend_image')."/uploads/images/events/header/". $data->image_header;
        if(empty($data))  {
            flash('Empty record.')->error();
            return redirect('/event');
        } 

        return view('dashboard.event.detail', compact('data', 'event_category', 'vendor', 'event_class', 'file', 'file2'));
    }
    public function event_post()
    {
        $event_category = Event_category::all();
        return view('dashboard.event.event-post', [ 'event_category' => $event_category ]);
    }
    public function event_post_when_where()
    {
        return view('dashboard.event.event-post-when-where');
    }
    public function event_post_ticket()
    {
        

        return view('dashboard.event.event-post-ticket');
    }
    public function event_post_custom()
    {
        

        return view('dashboard.event.event-post-custom');
    }

    public function post()
    {
        // dd(env('BACKEND_IMAGE'));
        
        $event_category = Event_category::all();
        $vendor = Vendor::with('user')->orderByRaw('id DESC')->whereHas('user')->get();
        // $event_class = EventClass::get();
        // return json_encode($vendor[0]['user']['id']);
        return view('dashboard.event.post', compact( 'event_category', 'vendor' ));
    }
    public function event_class($id)
    {
        
        // $event_category = Event_category::all();
        // $vendor = Vendor::with('user')->orderByRaw('id DESC')->whereHas('user')->get();
        // return json_encode($vendor);
        // return view('dashboard.event.post', compact( 'event_category', 'vendor' ));
        $vendor = Vendor::with('user')->where('id', $id)->get();

        $event_class = EventClass::where('user_id', $vendor[0]['user_id'])->get();
        return json_encode($event_class);
        // return json_encode('$vendor');


    }
    public function class_store(Request $request)
    {
        
        $vendor = Vendor::with('user')->where('id', $request['id_vendor'])->get();
        EventClass::create([
            'user_id' => $vendor[0]['user_id'],
            'name' => $request['name']
        ]);
        $event_class = EventClass::where('name', $request['name'])->orderByRaw('id DESC')->first();


        return json_encode($event_class);
        // return json_encode('$vendor');


    }
    
    public function store(Request $request)
    {


        DB::beginTransaction();
        try{

$start_arr = json_decode($request['start_form']);
$end_arr = json_decode($request['end_form']);
$all_arr = json_decode($request['arr_all']);
$sc_name = json_decode($request['schedule_name_form']);
$sc_start = json_decode($request['start_schedule_form']);

$sc_end = json_decode($request['end_schedule_form']);



$data_all = $request->all();
// dd($data_all);
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request['name_event_form']), '-'));
$event_slug = Event::where('slug', $slug)->get();
// dd(count($event_slug) == 0 ? $slug : $slug.(count($event_slug)+1));

$client = new Client();

$url   = config()->get('app.backend_image')."/api/v1/event/headerimage/add";
$url2   = config()->get('app.backend_image')."/api/v1/event/posterimage/add";

$response = $client->post( $url, ([
    'headers' => [
        // 'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Client-Key' => config()->get('app.client_key') 
                    ],
    
    'multipart' => [

        // 'foto_tempat_usaha' => $input['profile-img'],
        [
            'name'     => 'image_header',
            'contents' => file_get_contents($data_all['profile_img'], 'r'),
            'filename' => $data_all['profile_img']->getClientOriginalName()
        ]
    ]
]));
$response = json_decode($response->getBody());

$response2 = $client->post( $url2, ([
    'headers' => [
        // 'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Client-Key' => config()->get('app.client_key')
                    ],
    
    'multipart' => [

        // 'foto_tempat_usaha' => $input['profile-img'],
        [
            'name'     => 'image',
            'contents' => file_get_contents($data_all['profile_img3'], 'r'),
            'filename' => $data_all['profile_img3']->getClientOriginalName()
        ]
    ]
]));
$response2 = json_decode($response2->getBody());
// dd($response->data->imagename);


// $array_start = str_replace($replace, "",$request['start_form']);
// $array_end = str_replace($replace, "",$request['end_form']);
            Event::create([
                'name' => $request['name_event_form'],
                // 'event_date_start' => $start_arr[0],
                // 'event_date_end' =>$start_arr[0],
                // 'register_date_start' => $start_arr[0],
                // 'register_date_end' => $start_arr[0],

                // 'register_date_end' => '1',
                'venue' => $request['venue_form'],

                // 'location' => '',
                'address' => $request['address_form'],
                'latitude' => $request['lat_form'],
                'longitude' => $request['lng_form'],
                // 'city_id' => '0',
                'detail' => $request['detail_event_form'],
                'image' => $response2->data->imagename,
                'image_header' => $response->data->imagename,
                'slug' => count($event_slug) == 0 ? $slug : $slug.'-'.(count($event_slug)+1),
                'vendor_id' => $request['vendor_id_form'],
                'event_category_id' => $request['category_event_form'],
                'privacy' => $request['privacy_event_form'],
                // 'barcode' => '0',
                'status' => $request['status_form'],
                'is_paid' => $request['is_paid'],
                'contact_detail' => $request['email'],
                'additional_order_message' => $request['additional']




            ]);
            $event = Event::where('name', $request['name_event_form'])->where('vendor_id', $request['vendor_id_form'])->orderByRaw('id DESC')->first();
            
            for($i=0; $i< count($end_arr); $i++){
                Event_time::create([
                    'event_id' => $event->id,
                    'event_date_start' => $start_arr[$i],
                    'event_date_end' =>$end_arr[$i],
                    
                    ]);
                    

                }

            for($i=0; $i< count($sc_name); $i++){
                Event_schedule::create([
                    'event_id' => $event->id,
                    'name' => $sc_name[$i],
                    'start_date' =>$sc_start[$i],
                    'end_date' =>$sc_end[$i],

                    
                    ]);
                    $event_schedule = Event_schedule::where('event_id', $event->id)
                                                        ->where('name', $sc_name[$i])
                                                        ->where('start_date', $sc_start[$i])
                                                        ->where('end_date', $sc_end[$i])
                                                        ->orderByRaw('id DESC')
                                                        ->first();

                    for($ii=0; $ii< count($all_arr); $ii++){
                        // return json_encode($event_schedule->id);

                            if($all_arr[$ii]->type_class == ($i+1)){
                                // return json_encode(explode("-", $all_arr[$ii]->event_time)[0]);
                                $event_time = Event_time::where('event_date_start', explode("-", $all_arr[$ii]->event_time)[0])
                                                        ->where('event_date_end', explode("-", $all_arr[$ii]->event_time)[1])
                                                        ->orderByRaw('id DESC')
                                                        ->first();
                                // return json_encode($event_time->id);
                                
                                Ticket::create([

                                    'event_class_id' => $all_arr[$ii]->name_schedule,
                                    'event_time_id' => $event_time->id,
                                    'name' => $all_arr[$ii]->name_schedule,
                                    'price' => $all_arr[$ii]->price,
                                    'total' => $all_arr[$ii]->quantity,
                                    'event_schedule_id' => $event_schedule->id,
                                    'max_order' => $all_arr[$ii]->max,
                                    'min_order' => $all_arr[$ii]->min
                                    
                                    ]);
                            }

                        }
                }


                
                DB::commit();
                flash('Data success saved!')->success();
        return redirect('/event' );
            
        }catch(Exception $e){
            DB::rollback();

            flash('Data failed saved!')->error();
        return redirect('/event' );

            
        }
 
            }

    public function edit($id)
    {
        //

        $data = Event::with('event_category', 'event_schedule.ticket.event_class','event_schedule.ticket.event_time', 'event_time', 'vendor')->find($id);
        // $data = Event::with('vendor')->find($id);
        $event_category = Event_category::all();
        $vendor = Vendor::with('user')->orderByRaw('id DESC')->whereHas('user')->get();
        $event_class = EventClass::where('user_id', $data->vendor->user_id )->get();
        // return json_encode($data);
        $file = config()->get('app.backend_image')."/uploads/images/events/poster/". $data->image;
        $file2 = config()->get('app.backend_image')."/uploads/images/events/header/". $data->image_header;
        if(empty($data))  {
            flash('Empty record.')->error();
            return redirect('/event');
        } 

        return view('dashboard.event.edit', compact('data', 'event_category', 'vendor', 'event_class', 'file', 'file2'));
    }

    public function status_update(Request $request)
    {
        
        $event = Event::find($request->id_event);
        $event->status = $request->pub;
        $event->save();
        return json_encode($request->pub);
        // return json_encode('$vendor');
    }

    public function update_first(Request $request, $id)
    {
        $data = $request->all();
        // return json_encode($data);

        $event = Event::find($id);
        if($request->name){
        $event->name = $request->name;
        $event->detail = $request->detail_update;
        $event->event_category_id = $request->event_category_id;
        $event->privacy = $request->privacy;
        $event->save();
        }
        if($request->address){
        $event->address = $request->address;
        $event->venue = $request->venue;
        $event->latitude = $request->lat;
        $event->longitude = $request->lng;
        $event->save();
        }
        
        flash('Data success changed!')->success();
        return redirect('/event/edit/'.$id );

        // return json_encode($event);
        // return json_encode($request->pub);
        // return json_encode('$vendor');
    }

    public function date_edit(Request $request)
    {
        
        $event_time = Event_time::find($request->id_date);
        return json_encode($event_time);
        // return json_encode('$vendor');
    }
    public function date_update(Request $request)
    {
        
        // return json_encode($request['date_start_modal']);
        $event_time = Event_time::find($request['id_date']);
        $event_time->event_date_start = $request['date_start_modal'];
        $event_time->event_date_end = $request['date_end_modal'];
        $event_time->save();
        flash('Data success changed!')->success();
        return redirect('/event/edit/'.$request['id_event'] );
        // return json_encode('$vendor');
    }
    public function date_add(Request $request, $id)
    {
        
        // $event_time = Event_time::find($request->id_date);
        Event_time::create([
            'event_id' => $id,
            'event_date_start' => $request->date_start_modal_add,
            'event_date_end' =>$request->date_end_modal_add,
            
            ]);

            flash('Data success create!')->success();
        return redirect('/event/edit/'.$id );
    }
    public function date_add_modal(Request $request)
    {
        // return json_encode($request->all());
        // $event_time = Event_time::find($request->id_date);
        Event_time::create([
            'event_id' => $request->id_add,
            'event_date_start' => $request->start_date,
            'event_date_end' =>$request->end_date,
            
            ]);

            return json_encode('Success');

    }
    public function date_delete($id, $event)
    {
        
        // $event_time = Event_time::find($request->id_date);
        // dd($id, $event);

        $event_time = Event_time::find($id);
        // dd($event_time);
        $event_time->delete();

            flash('Data success delete!')->success();
        return redirect('/event/edit/'.$event );
    }

    public function schedule_update(Request $request, $id)
    {
        
        // $event_time = Event_time::find($request->id_date);
        // dd($id, $event);
        // return json_encode($request->all());

        $event_schedule = Event_schedule::find($request->id_schedule);
        $event_schedule->name = $request->schedule_name;
        $event_schedule->start_date = $request->start_schedule;
        $event_schedule->end_date = $request->end_schedule;

        $event_schedule->save();
        // return json_encode($event_schedule);

            flash('Data success update!')->success();
        return redirect('/event/edit/'.$id );
    }
    public function tikcket_add(Request $request, $id)
    {
        
        // $event_time = Event_time::find($request->id_date);
        // return json_encode($request->all());
        Ticket::create([
            'event_class_id' => $request->name_schedule,
            'event_time_id' => $request->event_time,
            'name' =>$request->name_schedule,
            'price' =>$request->price,
            'total' =>$request->quantity,
            'event_schedule_id' =>$request->id_schedule,
            'min_order' =>$request->min,
            'max_order' =>$request->max,
            ]);

            flash('Data success create!')->success();
        return redirect('/event/edit/'.$id );
    }

    public function ticket_delete(Request $request)
    {
        
        // $event_time = Event_time::find($request->id_date);
        // dd($id);
        // return json_encode($request->all());

        $ticket = Ticket::find($request->id_date);
        // dd($event_time);
        $ticket->delete();
        return json_encode('success');

        //     flash('Data success delete!')->success();
        // return redirect('/event/edit/'.$event );
    }
    public function schedule_add(Request $request, $id)
    {
        
        // $event_time = Event_time::find($request->id_date);
        // dd($id);
        // return json_encode($request->all());

        Event_schedule::create([
            'event_id' => $id,
            'name' => $request->schedule_name,
            'start_date' =>$request->date_start,
            'end_date' =>$request->date_end,
            
            ]);
      
            flash('Data success create!')->success();
        return redirect('/event/edit/'.$id );
        
    }
    public function schedule_delete( $id, $id_event)
    {
        
        // $event_time = Event_time::find($request->id_date);
        // dd($id, $id_event);
        // return json_encode($request->all());
        $event_schedule = Event_schedule::find($id);
        $event_schedule->delete();
        $ticket = Ticket::where('event_schedule_id', $id);
        $ticket->delete();
        // return json_encode('success');

      
            flash('Data success deleted!')->success();
        return redirect('/event/edit/'.$id_event );
        
    }

    public function last_update(Request $request, $id)
    {
        
        // $event_time = Event_time::find($request->id_date);
        // dd($request);
        $event = Event::find($id);
        $event->contact_detail = $request->email;
        $event->additional_order_message = $request->additional;
        $event->save();
        
        // return json_encode($event->image_header);


        $client = new Client();
        $url   = config()->get('app.backend_image')."/api/v1/event/headerimage/add";
        $url2   = config()->get('app.backend_image')."/api/v1/event/posterimage/add";

        if ($request->hasFile('profile_img')) {
                $response = $client->post( $url, ([
                    'headers' => [
                        // 'Content-Type' => 'application/json',
                                    'Accept' => 'application/json',
                                    'Client-Key' => config()->get('app.client_key')
                                    ],
                    
                    'multipart' => [

                        // 'foto_tempat_usaha' => $input['profile-img'],
                        [
                            'name'     => 'image_header',
                            'contents' => file_get_contents($request['profile_img'], 'r'),
                            'filename' => $request['profile_img']->getClientOriginalName()
                        ],
                        [
                            'name'  => 'image_header_old',
                            'contents' => $event->image_header
                        ],
                    ]
                ]));
                $response = json_decode($response->getBody());

                $event->image_header = $response->data->imagename;
                $event->save();
        }




        if ($request->hasFile('profile_img3')) {
     
                        $response2 = $client->post( $url2, ([
                            'headers' => [
                                // 'Content-Type' => 'application/json',
                                            'Accept' => 'application/json',
                                            'Client-Key' => config()->get('app.client_key')
                                            ],
                            
                            'multipart' => [

                                // 'foto_tempat_usaha' => $input['profile-img'],
                                [
                                    'name'     => 'image',
                                    'contents' => file_get_contents($request['profile_img3'], 'r'),
                                    'filename' => $request['profile_img3']->getClientOriginalName()
                                ],
                                [
                                    'name'  => 'image',
                                    'contents' => $event->image
                                ],
                            ]
                        ]));
                        $response2 = json_decode($response2->getBody());


                        $event->image = $response2->data->imagename;
                        $event->save();
                    }



        

      
            flash('Data success deleted!')->success();
        return redirect('/event/edit/'.$id );
        
    }

    public function export_event(Request $request)
    {
        //
        // return json_encode($request->all());
        ini_set("memory_limit","1024M");
        set_time_limit(0);
        $data = Event::get();      
        if (!empty ($request->get('event')) ){
            $data = $data->where('id', $request->get('event'));
            
        }
        if (!empty ($request->get('status')) || ($request->get('status') == "0") ){
            $data = $data->where('status', $request->get('status'));
            
        }
        // return json_encode($data);

        return Excel::download(new Event_download($data
      
        
                                                    // $request->is_trx_ppob,
                                                    // $request->merchant_id,
                                                    // $request->order_status
        ), 'event.xlsx');


    }
    public function set_featured($id)
    {
        // $data = $request->all();
        
        $event = Event::where('featured', 1)->update(['featured' => 0]);

        $event_find = Event::find($id);      
        $event_find->featured = 1;
        $event_find->save();
        // return json_encode($id);
        
        
        
        flash('Data success changed!')->success();
        return redirect('/event' );

        // return json_encode($event);
        // return json_encode($request->pub);
        // return json_encode('$vendor');
    }
}
