<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event_category extends Model
{
    //
    // protected $table = 'event_categories';
    public function event(){
        return $this->hasMany('App\Models\Event');
    }
}
