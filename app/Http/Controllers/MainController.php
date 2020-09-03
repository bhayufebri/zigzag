<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Event;
use App\Models\User_ticket;
use PDF,QrCode;
use View,Excel;
use Illuminate\Support\Facades\Auth;
use Validator, DataTables;
use App\Exports\Order_download;
use GuzzleHttp\Client;
use App\User;
use App\Models\User_detail;
use Illuminate\Support\Facades\Hash;
use App\Models\Category_product;
use App\Models\Product;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $category_product = Category_product::all();
        View::share('category_product', $category_product);
   
    }
    public function index()
    {
        //
        // $invoice = Invoice::with('invoice_detail', 'invoice_history', 'event', 'user', 'payment_method')->limit('10')->orderByRaw('created_at DESC')->get();
        // return json_encode($invoice);
        // {   
            // $category_product = Category_product::all();
            // $product = Product::with('category_product:id,category_name')->select('id', 'product_name', 'category_product_id', 'price', 'is_show', 'image')->where('is_show', 1)->paginate(9);
        //     $invoice = Invoice::groupBy('status')->select('status')->get();
        // $product = $product->groupBy('category_product.category_name');
        // return json_encode($product);
        // $user = User::with('group')->limit(10)->get();
        $product = Product::with('category_product:id,category_name', 'order_detail.order')
        ->select('id', 'product_name', 'category_product_id', 'price', 'is_show', 'image', 'date_acara')
        ->where('is_show', 1)
        
        ->get();
        // return json_encode($product);

            return view('main.index', compact('product'));
        // }
    }
    public function index_from_top(Request $request)
    {
        // return json_encode($request->all());
        $product = Product::with('category_product:id,category_name')->select('id', 'product_name', 'category_product_id', 'price', 'is_show', 'image')->where('is_show', 1);
        if (!empty ($request->get('category_id')) ){
            $product = $product->where('category_product_id', $request->get('category_id'));
        }
        if (!empty ($request->get('product_name')) ){
            $product = $product->where('product_name', 'LIKE', "%".$request->get('product_name')."%");
        }

        
        // return json_encode($product->get());
        $product = $product->get();
        // return json_encode($product);
        
        return view('main.index', compact('product'));
        
    }
    public function contain_req(Request $request)
    {
        $product = Product::with('category_product:id,category_name')->select('id', 'product_name', 'category_product_id', 'price', 'is_show', 'image')->where('is_show', 1)->where('category_product_id', $request->category_id)->get();
        return $product;
    }
    
    public function filter_req(Request $request)
    {
        $product = Product::with('category_product:id,category_name')->select('id', 'product_name', 'category_product_id', 'price', 'is_show', 'image')->where('is_show', 1);
        if (!empty ($request->get('category_id')) ){
            $product = $product->where('category_product_id', $request->get('category_id'));
        }
        
        if (!empty ($request->get('top_range')) && ($request->get('bottom_range'))){
            // $start = $request->get('start_date').split(" ");
            $product = $product->whereBetween('price', [$request->get('bottom_range'), $request->get('top_range')]);
            // $product = $product->where('price', '>', $request->get('bottom_range'));
            // $product = $product->where('price', '<', $request->get('top_range'));

            // $product = $product->whereBetween('price', [30000, 40000]);

            // $data = $data->whereBetween('created_at', [$start['0'], $start['1'])]);

        }
        $sp = $product->get();
        return $sp;
    }
    public function like(Request $request)
    {

        // return json_encode($request->all());
        $product = Product::find($request->id);
        $like = ($product->like + 1);
        // return json_encode($like);

        $product->like = $like;
        $product->save();

        // $detail_product = Detail_product::find($request->id);
        // $detail_product->detail_product_name = $request->detail_product_name;
        // $detail_product->stock = $request->stock;
        // $detail_product->save();

        return 'updated';
    }
    public function checkout()
    {
        //
        // $invoice = Invoice::with('invoice_detail', 'invoice_history', 'event', 'user', 'payment_method')->limit('10')->orderByRaw('created_at DESC')->get();
        // return json_encode($invoice);
        {   
            $event = Event::select('id', 'name')->get();
            $invoice = Invoice::groupBy('status')->select('status')->get();

        // return json_encode($invoice);

            return view('main.checkout');
        }
    }
    public function mainlogin()
    {
        //
        // $invoice = Invoice::with('invoice_detail', 'invoice_history', 'event', 'user', 'payment_method')->limit('10')->orderByRaw('created_at DESC')->get();
        // return json_encode($invoice);
        // {   
        //     $event = Event::select('id', 'name')->get();
        //     $invoice = Invoice::groupBy('status')->select('status')->get();

        // return json_encode($invoice);

            return view('main.login');
        // }
    }
    public function mainregister()
    {
        //
        // $invoice = Invoice::with('invoice_detail', 'invoice_history', 'event', 'user', 'payment_method')->limit('10')->orderByRaw('created_at DESC')->get();
        // return json_encode($invoice);
        // {   
        //     $event = Event::select('id', 'name')->get();
        //     $invoice = Invoice::groupBy('status')->select('status')->get();

        // return json_encode($invoice);

            return view('main.register');
        // }
    }
    public function mainregisterstore(Request $request)
    {
        // $this->validate($request, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
        

        //  User::create([
        //     'first_name' => $request['name'],
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        //     'permissions' => 'customer'
        // ]);

        
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'unique:user_details'],
            'id_number' => ['required', 'string'],
            'state-province' => ['required', 'string'],
            'institusi' => ['required', 'string']
            ]);
            
            // return json_encode($request->all());

        $user = User::create([
            'first_name' => $request['first_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'last_name' => $request['state-province'],
            'persist_code' => $request['institusi'],
            'permissions' => 'customer'

        
        
        ]);

        // return $user;

        User_detail::create([
            'user_id' => $user->id,
            'phone' => $request['phone'],
            'id_card' => $request['id_number']

        ]);



        // return json_encode('terdaftar');
        flash('Account has created')->success();
        return redirect('/mainlogin' );


            // return view('main.login');
        // }
    }
    public function indexData(Request $request){
        if($request->ajax()){
        // $data = User::with('group')->whereHas('user_detail');
        $data = Invoice::with('invoice_detail', 'invoice_history', 'invoice_detail.user_ticket', 'event', 'user', 'payment_method');
        if (!empty ($request->get('event')) ){
            $data = $data->where('event_id', $request->get('event'));
            
        }
        if (!empty ($request->get('status')) ){
            $data = $data->where('status', $request->get('status'));
            
        }

        return Datatables::of($data)
                
                ->editColumn('action', function($data){ return view('dashboard.order.index-action', compact('data'));})
                ->editColumn('first_name', function ($data) {
                    
                            return $data->user['first_name']; 
                       
                        })
                ->editColumn('event', function ($data) {
                 return $data->event['name']; 
                    })
                ->editColumn('invoice_no', function ($data) {
                    if($data->invoice_no){
                        return $data->invoice_no; 
                    }else{
                        return $data->invoice_number;
                    }
                      })
                ->editColumn('quantity', function ($data) {
                        // return $data->invoice_detail; 

                        $sum = 0;
                        foreach($data->invoice_detail as $item) {
                            $sum += $item['jml'];
                        }
                        return $sum; 
                        // return array_sum(array_column($data->invoice_detail, 'jml'));
                           })
                ->editColumn('payment_method', function ($data) {
                    if($data->payment_method){
                        return $data->payment_method->name; 
                    }else{
                        return '';
                    }
                            
                        })
                ->editColumn('confirm', function ($data) {
                    if($data->invoice_detail){
                        // return count($data->invoice_detail); 
                        $sum_tic = 0;
                        for($i=0; $i<count($data->invoice_detail); $i++){
                            
                            if($data->invoice_detail[$i]->user_ticket){
                                if(count($data->invoice_detail[$i]->user_ticket) != 0){
                                    $sum_tic += count($data->invoice_detail[$i]->user_ticket);
                                    // return '<a class="bg-success text-white text-nowrap py-1 px-3 text-center radius-5 d-block" href="#">Resend '.count($data->invoice_detail[$i]->user_ticket).' ticket</a>' ; 
                                }else{
                                    return '';
                                }
                            }else{
                                return '';
                            }
                            
                            // return count($data->invoice_detail[$i]->user_ticket);
                        }
                        // return $sum_tic; 
                        if($sum_tic != 0){

                            return '<a class=" btn btn-outline-success  text-nowrap py-0 px-1 text-center radius-1 d-block" href="#">Resend ('.$sum_tic.')</a>';
                        }
                        
                    }else{
                        return '';
                    }
                            
                        })
                ->rawColumns(['action', 'first_name', 'event', 'invoice_no', 'quantity', 'payment_method', 'confirm'])
                ->make(true); 
            }
            else  {
                flash('WARNING')->warning();
               return redirect('/order');
               }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $data = Invoice::with('invoice_detail.ticket', 'invoice_detail.user_ticket', 'invoice_history', 'event', 'user', 'payment_method')->where('id', $id)->get();
        // return json_encode($data);
        return view('main.detail');

    }
    public function show_detail($id)
    {
        //
        // $data = Invoice::with('invoice_detail.ticket', 'invoice_detail.user_ticket', 'invoice_history', 'event', 'user', 'payment_method')->where('id', $id)->get();
        $data = Product::where('id', $id)->get();
        
        // return json_encode($data);
        return view('main.show_detail', compact( 'data' ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Invoice::with('invoice_detail.ticket', 'invoice_detail.user_ticket', 'invoice_history', 'event', 'user', 'payment_method')->where('id', $id)->get();
        // return json_encode($data);
        $invoice = Invoice::groupBy('status')->select('status')->get();
        return view('dashboard.order.edit', compact( 'data', 'invoice' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // return json_encode($request->all(), Auth::user()->id);
        $client = new Client();
        $input = $request->all();

        $url   = config()->get('app.backend_image')."/api/v1/transaction/changestatus";
        // return json_encode($input['invoice_no']);
       

        $response = $client->post( $url, ([
            'headers' => [
                // 'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                            'Client-Key' => config()->get('app.client_key') 
                            ],
            
            'multipart' => [

                // 'foto_tempat_usaha' => $input['profile-img'],
                [
                    'name'  => 'order_id',
                    'contents' => $input['invoice_no']
                ],
                [
                    'name'  => 'user_id',
                    'contents' => Auth::user()->id
                ],
                [
                    'name'  => 'transaction_status',
                    'contents' => $input['status']
                ],
                
            ]
        ]));
        $id_invo = $input['id_invo'];
        $response = json_decode($response->getBody());
        // return json_encode($response->meta->error);
        // route('order.edit', $data->id)
        if($response->meta->error == true){
            flash($response->meta->message)->error();
            return redirect('/order/'.$id_invo.'/edit' );
        }
        if($response->meta->error == false){
            flash($response->meta->message)->success();
            return redirect('/order/'.$id_invo.'/edit' );
        }
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function cetak_pdf($id)
    {
        $user_ticket = User_ticket::with('invoice_detail.invoice.event', 'invoice_detail.ticket.event_time', 'buyer')->where('id',$id)->get();
        // dd($user_ticket[0]->ticket_number);
        // return json_encode($user_ticket);
        $qr = QrCode::size(300)->generate('A basic example of QR code!');
 
    	$pdf = PDF::loadview('ticket',['user_ticket'=>$user_ticket[0], 'qr'=>$qr] );
    	return $pdf->download('ticket.pdf');
    }

    public function export_order(Request $request)
    {
        //
        // return json_encode($request->all());
        ini_set("memory_limit","1024M");
        set_time_limit(0);
        $data = Invoice::with('invoice_detail', 'invoice_history', 'event', 'user', 'payment_method');
        if (!empty ($request->get('event')) ){
            $data = $data->where('event_id', $request->get('event'));
            
        };
        if (!empty ($request->get('status')) ){
            $data = $data->where('status', $request->get('status'));
            
        };

        // return json_encode($data->get());
        return Excel::download(new Order_download($data->get()
      
        
                                                    // $request->is_trx_ppob,
                                                    // $request->merchant_id,
                                                    // $request->order_status
        ), 'order.xlsx');


    }

    
}
