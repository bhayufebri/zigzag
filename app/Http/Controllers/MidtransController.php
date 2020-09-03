<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Invoice;
use App\Models\Midtrans_detail;
use App\Models\Order;
// use App\Models\Order_detail;

// use App\Models\Product;


// use App\Models\User_ticket;
// use PDF,QrCode,DB;
// use Excel;
use Str;
// use Illuminate\Support\Facades\Auth;
// use Validator, DataTables;
// use App\Exports\Order_download;
// use GuzzleHttp\Client;
// use App\User;
// use Illuminate\Support\Facades\Hash;


// class MidtransController extends Controller
// {


    class MidtransController extends Controller
{

    public function __construct()
    {
        // $this->validationHelper = new ValidationHelper;
        // $this->responseHelper   = new ResponseHelper;
        // $this->ppobHelper      = new PPOBHelper;
        // $this->notificationHelper = New NotificationHelper;
    }
    public function midtransNotification(Request $request){
        // return json_encode($request->order_id);
        $order_id = $request->order_id;
        $order_id_pecah = explode("-",$order_id);
        // return json_encode($order_id_pecah[1]);
        // \Log::info('tembak midtrans:', json_encode($request->all()));
        Midtrans_detail::create([
            'order_id' => $order_id_pecah[1],
            'payment_method' => $request->payment_type,
            'status' => $request->transaction_status,
            'json_detail' => json_encode($request->all())        
        ]);



        $order = Order::find($order_id_pecah[1]);
        // if($request->status == 'success'){
            $order->status = $request->transaction_status == 'settlement' ? 'success' : $request->transaction_status;

            do{

                // $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                //                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                //                 .'0123456789!@$&*()'); // and any other characters
                // shuffle($seed); // probably optional since array_is randomized; this may be redundant
                // $filename = '';
                // foreach (array_rand($seed, 32) as $k) $filename .= $seed[$k];

                // $filename=str_random(32);
                $filename=Str::random(32);
                $checkuniq = Order::where('qr_code', $filename)->first();
            }while(!empty($checkuniq));

            $order->qr_code = $filename;
            $order->save();
        // };


        return json_encode($order);
        }

    
}
