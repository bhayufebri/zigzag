<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    //
    protected $fillable = [
       
        'order_id',
        'jlm_item' ,
        'price',
        'subtotal',
        'product_id'
];

public function product(){
    return $this->belongsTo('App\Models\Product');
}
public function order(){
    return $this->belongsTo('App\Models\Order');
}
    
}
