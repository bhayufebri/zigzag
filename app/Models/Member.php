<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //

    protected $fillable = [
       
        'nama',
        'nik' ,
        'lembaga',
        'bank',
        'rekening',
        'alamat',      
        'tanggal_lahir',
        'no_handphone',
        'password',
        'status',
        'tanggal_keluar',
        'type'
];

    // public function category_product(){
    //     return $this->belongsTo('App\Models\Category_product');
    // }
    // public function detail_product(){
    //     return $this->hasMany('App\Models\Detail_product');
    // }
    // public function order_detail(){
    //     return $this->hasMany('App\Models\Order_detail');
    // }
}
