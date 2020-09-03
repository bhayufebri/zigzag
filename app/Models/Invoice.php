<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    public function invoice_detail(){
        return $this->hasMany('App\Models\Invoice_detail');
    }
    public function invoice_history(){
        return $this->hasMany('App\Models\Invoice_history');
    }
    public function event(){
        return $this->belongsTo('App\Models\Event');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function payment_method(){
        return $this->belongsTo('App\Models\Payment_method');
    }
}
