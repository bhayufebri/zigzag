<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventClass extends Model
{
    //
    protected $table = 'event_class';
    protected $fillable = [
       
        'user_id',
        'name' 
  
];
}
