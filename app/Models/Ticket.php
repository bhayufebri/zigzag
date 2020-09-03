<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
       
        'event_class_id',
        'event_time_id' ,
        'name',
        'price',
        'total',
        'event_schedule_id',
        'max_order',
        'min_order'
  
];

public function event_class(){
        return $this->belongsTo('App\Models\EventClass');
    }
    public function event_time(){
        return $this->belongsTo('App\Models\Event_time');
    }
}
