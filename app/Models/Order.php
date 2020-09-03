<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
       
        'status',
        'user_id' ,
        'payment_method',
        'total',
        'va_number',
        'qr_code',
        'link_sertifikat'
];


public function order_detail(){
    return $this->hasMany('App\Models\Order_detail');
}
public function user(){
    return $this->belongsTo('App\Models\User');
}
public function midtrans_detail(){
    return $this->hasMany('App\Models\Midtrans_detail');
}
    
}
