<?php

namespace App\Exports;

// use App\User;
// use App\Models\Transaction;
// use App\Models\DailySettlement;

// use Maatwebsite\Excel\Concerns\FromQuery;
// use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;


// use DB;


class Event_download implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    // private $data = [];
    public function __construct($data
    //  $is_trx_ppob
    //  string $merchant_id, 
    //  string $order_status
     )
    {
        $this->data = $data;
        // $this->is_trx_ppob = $is_trx_ppob;
        // $this->merchant_id = $merchant_id;
        // $this->order_status = $order_status;
        // $this->bagian = $bagian;
    }
    
    public function view(): View
    {  
        
        $data= $this->data;
        // dd($data[0]['id']);
           
        return view('exports.event',['data' => $data]);
    }
   
}