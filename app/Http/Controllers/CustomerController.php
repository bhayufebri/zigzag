<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Event;
use App\Models\Order;
use App\Models\Order_detail;

use App\Models\Product;


use App\Models\User_ticket;
use PDF,QrCode,DB;
use Excel;
use Illuminate\Support\Facades\Auth;
use Validator, DataTables;
use App\Exports\Order_download;
use GuzzleHttp\Client;
use App\Models\User;
use App\Models\User_detail;

use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
   
    }
    public function index()
    {
        //
        // $invoice = Invoice::with('invoice_detail', 'invoice_history', 'event', 'user', 'payment_method')->limit('10')->orderByRaw('created_at DESC')->get();
        // return json_encode($invoice);
        // {   
        //     $event = Event::select('id', 'name')->get();
        //     $invoice = Invoice::groupBy('status')->select('status')->get();

        // return json_encode($invoice);
        // $user = User::with('group')->limit(10)->get();
        
        // return json_encode(Auth::user());
        // $order = Order::with('order_detail.product')
        //     ->whereHas('order_detail.product', function ($query) {
        //     $query->where('is_show', 1);
        //         })
        //     ->get();

        // return json_encode($order);

        $product = Product::with('category_product:id,category_name', 'order_detail.order')
        ->select('id', 'product_name', 'category_product_id', 'price', 'is_show', 'image', 'date_acara')
        ->where('is_show', 1)
        // ->where('order_detail[0].order.user_id', Auth::user()->id)
        // ->whereHas('order_detail.order', function ($query) {
        //     $query->where('user_id', '<>', Auth::user()->id);
        // })
        // ->whereDoesntHave('order_detail')
        ->get();

        // $order = Order::with
        // return json_encode($product);


            return view('customer.index', compact('product'));
        // }
    }
    public function list()
    {
        //
        // $invoice = Invoice::with('invoice_detail', 'invoice_history', 'event', 'user', 'payment_method')->limit('10')->orderByRaw('created_at DESC')->get();
        // return json_encode($invoice);
        // {   
        //     $event = Event::select('id', 'name')->get();
        //     $invoice = Invoice::groupBy('status')->select('status')->get();

        // return json_encode($invoice);
        // $user = User::with('group')->limit(10)->get();
        // $order = Order::with('order_detail.product')
        // ->where('user_id', Auth::user()->id )->get();
        
        // return json_encode($order);

            return view('customer.list');
        // }
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
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        

         User::create([
            'first_name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'permissions' => 'customer'
        ]);
        // return json_encode('terdaftar');
        flash('Account has created')->success();
        return redirect('/mainlogin' );


            // return view('main.login');
        // }
    }
    public function indexData(Request $request){
        // if($request->ajax()){
        // $data = User::with('group')->whereHas('user_detail');
        // $data = Invoice::with('invoice_detail', 'invoice_history', 'invoice_detail.user_ticket', 'event', 'user', 'payment_method');
        $data = Order::with('order_detail.product', 'midtrans_detail')->where('user_id', Auth::user()->id )->get();
        

        return Datatables::of($data)
                
                ->editColumn('action', function($data){ return view('customer.index-action', compact('data'));})
                // ->editColumn('first_name', function ($data) {
                    
                //             return $data->user['first_name']; 
                       
                //         })
                ->editColumn('product', function ($data) {
                 return $data->order_detail[0]->product['product_name']; 
                    })
                ->editColumn('status', function ($data) {
                    if($data->status == 'new'){
                        return '<span class="badge badge-primary">New</span>';
                    }else if($data->status == 'pending'){
                        return '<span class="badge badge-warning">Pending</span>';
                    }else if($data->status == 'success'){
                        return '<span class="badge badge-success">Success</span>';
                    }else if($data->status == 'failed '){
                        return '<span class="badge badge-danger">failed</span>';
                    }else if($data->status == 'hadir'){
                        return '<span class="badge badge-dark">hadir</span> 
                        <div class="alert alert-primary" role="alert">
                        Sertifikat/Piagam akan segera dikirim ke dashboard anda.
                      </div>';
                    }else{
                        return '<span class="badge badge-light">'.$data->status.'</span>';
                    }
                      })
                // ->editColumn('histori', function ($data) {
                //     if($data->midtrans_detail){
                //         $arr=[];
                //         for($i=0; $i<count($data->midtrans_detail); $i++){
                //             array_push($arr, ' '.$data->midtrans_detail[$i]->payment_method.'('.$data->midtrans_detail[$i]->status.'/'. $data->midtrans_detail[$i]->created_at .')');
                //         }
                //         return $arr;
                //     }
                //            })
                // ->editColumn('payment_method', function ($data) {
                //     if($data->payment_method){
                //         return $data->payment_method->name; 
                //     }else{
                //         return '';
                //     }
                            
                //         })
                // ->editColumn('confirm', function ($data) {
                //     if($data->invoice_detail){
                //         // return count($data->invoice_detail); 
                //         $sum_tic = 0;
                //         for($i=0; $i<count($data->invoice_detail); $i++){
                            
                //             if($data->invoice_detail[$i]->user_ticket){
                //                 if(count($data->invoice_detail[$i]->user_ticket) != 0){
                //                     $sum_tic += count($data->invoice_detail[$i]->user_ticket);
                //                     // return '<a class="bg-success text-white text-nowrap py-1 px-3 text-center radius-5 d-block" href="#">Resend '.count($data->invoice_detail[$i]->user_ticket).' ticket</a>' ; 
                //                 }else{
                //                     return '';
                //                 }
                //             }else{
                //                 return '';
                //             }
                            
                //             // return count($data->invoice_detail[$i]->user_ticket);
                //         }
                //         // return $sum_tic; 
                //         if($sum_tic != 0){

                //             return '<a class=" btn btn-outline-success  text-nowrap py-0 px-1 text-center radius-1 d-block" href="#">Resend ('.$sum_tic.')</a>';
                //         }
                        
                //     }else{
                //         return '';
                //     }
                            
                //         })
                ->rawColumns(['action', 'product', 'status' ])
                ->make(true); 
            // }
            // else  {
            //     flash('WARNING')->warning();
            //    return redirect('/order');
            //    }

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
    public function user()
    {
        //
        $data = User::with('user_detail')->where('id', Auth::user()->id)->get();
        $data = $data[0];
        // return json_encode($data);
        // return view('main.detail');
        return view('customer.user', compact('data'));
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
        $data = Order::with('order_detail.product')->where('id', $id)->get();
        
        // return json_encode($data);
        return view('customer.detail', compact( 'data' ));

    }
    public function show_detail($id)
    {
        //
        // $data = Invoice::with('invoice_detail.ticket', 'invoice_detail.user_ticket', 'invoice_history', 'event', 'user', 'payment_method')->where('id', $id)->get();
        $data = Product::where('id', $id)->get();
        
        // return json_encode($data);
        return view('customer.detail_product', compact( 'data' ));

    }

    public function pay(Request $request)
    {
        //
        // return json_encode($request->all(), Auth::user()->id);
        // $client = new Client();
        // $input = $request->all();
        $data = Order::with('order_detail')->where('id', $request->order_id)->get();

        // $order = Order::find($request->order_id);
        // $order->status = 'pending';
        // $order->save();

        return $data;
    }
    public function order( $id)
    {
        // $this->validate($request, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
        $data = Order::with('order_detail')
            ->where('user_id', Auth::user()->id)
                ->whereHas('order_detail', function($q) use ($id){
                    $q->where('product_id', $id);
                })->get();

                if(count($data)>0){
                    flash('Anda sudah mengikuti item ini sebelumnya')->warning();
                return redirect('customer/list' );
                }
        
        // return json_encode(count($data));

        DB::beginTransaction();
        try{

        $data = Product::find($id);
        // return json_encode($data->price);

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'status' => 'new',
            'total' => $data->price,
            'payment_method' => 'snap',
            'va_number' => '0'
        ]);
        // return json_encode($order->id);

        $order_detail = Order_detail::create([
            'order_id' => $order->id,
            'product_id' => $id,
            'jlm_item' => '1',
            'price' => $data->price,
            'subtotal' => $data->price
        ]);
        // return json_encode($order_detail);  

    }catch(Exception $e){
        DB::rollback();

        flash('Data failed saved!')->error();
    return redirect('customer/index' );
        
    }
    DB::commit();
    flash('Item telah ditambahkan')->success();
    return redirect('customer/list' );
   
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
        // $user_ticket = User_ticket::with('invoice_detail.invoice.event', 'invoice_detail.ticket.event_time', 'buyer')->where('id',$id)->get();
        // // dd($user_ticket[0]->ticket_number);
        $order = Order::with('order_detail.product', 'user')->where('id', $id)->get();

        // return json_encode($order);
        $qr = QrCode::size(300)->generate('A basic example of QR code!');
 
    	$pdf = PDF::loadview('invoice',['order'=>$order[0], 'qr'=>$qr] );
    	return $pdf->download('invoice.pdf');
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
    public function update_user(Request $request)
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
           
            
            'phone' => ['required', 'string'],
            'id_number' => ['required', 'string'],
            'state-province' => ['required', 'string'],
            'institusi' => ['required', 'string']
            ]);
            
            // return json_encode($request->all());
            
            
            $user = User::where('id', Auth::user()->id)->get();
            
            $user[0]->first_name = $request['first_name'];
            $user[0]->last_name = $request['state-province'];
            $user[0]->persist_code = $request['institusi'];
            $user[0]->save();
            $user_detail = User_detail::where('user_id', $user[0]->id)->get();
            // return json_encode($user_detail);
            
            $user_detail[0]->phone = $request['phone'];
            $user_detail[0]->id_card = $request['id_number'];
            $user_detail[0]->save();
            



        // return json_encode('terdaftar');
        flash('Akun telah di update')->success();
        return redirect('/customer/user' );


            // return view('main.login');
        // }
    }
    

    // public function midtransNotification(Request $request){
    //     return 'eweras';
    //     }

    
}
