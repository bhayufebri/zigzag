<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event_schedule extends Model
{
    //
    protected $fillable = [
       
        'event_id',
        'name' ,
        'start_date',
        'end_date'
  
];
    
    public function event(){
        return $this->belongTo('App\Models\Event');
    }
    public function ticket(){
        return $this->hasMany('App\Models\Ticket');
    }
}
