<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
       
        'product_name',
        'category_product_id' ,
        'detail',
        'is_show',
        'price',      
        'price_secondary',
        'sale',
        'stock',
        'image',
        'date_acara'
];

    public function category_product(){
        return $this->belongsTo('App\Models\Category_product');
    }
    public function detail_product(){
        return $this->hasMany('App\Models\Detail_product');
    }
    public function order_detail(){
        return $this->hasMany('App\Models\Order_detail');
    }
}
