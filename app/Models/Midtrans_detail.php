<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Midtrans_detail extends Model
{
    //
    protected $fillable = [
       
        'order_id',
        'payment_method',
        'status',
        'json_detail' 
];


// public function order_detail(){
//     return $this->hasMany('App\Models\Order_detail');
// }
// public function user(){
//     return $this->belongsTo('App\Models\User');
// }
    
}
