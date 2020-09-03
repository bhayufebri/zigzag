<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice_detail extends Model
{
    //
    public function ticket(){
        return $this->belongsTo('App\Models\Ticket');
    }
    public function user_ticket(){
        return $this->hasMany('App\Models\User_ticket');
    }
    public function invoice(){
        return $this->belongsTo('App\Models\Invoice');
    }
}
