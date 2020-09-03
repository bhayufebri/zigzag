<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{
    //

    protected $fillable = [
       
        'user_id',
        'phone' ,
        'id_card'
];

    public function user(){
        return $this->belongTo('App\Models\User');
    }
}
