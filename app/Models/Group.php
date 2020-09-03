<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function user(){
        return $this->belongToMany('App\Models\User');
    }

}
