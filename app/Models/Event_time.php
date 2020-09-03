<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event_time extends Model
{
    //
    protected $fillable = [
       
        'event_id',
        'event_date_start' ,
        'event_date_end'
  
];
}
