<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //
    protected $fillable = [
        'password',
        'persist_code',
        'last_name'


    ];
    public function group(){
        return $this->belongsToMany('App\Models\Group');
    }
    public function users_group(){
        return $this->hasMany('App\Models\UsersGroup');
    }
    public function user_detail(){
        return $this->hasOne('App\Models\User_detail');
    }
    public function page() {
        return $this->hasMany('App\Models\Page');
    }
}
