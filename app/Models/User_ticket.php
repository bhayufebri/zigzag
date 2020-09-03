<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_ticket extends Model
{
    //
    protected $table = 'user_ticket';
    public function invoice_detail(){
        return $this->belongsTo('App\Models\Invoice_detail');
    }
    public function buyer(){
        return $this->belongsTo('App\Models\Buyer');
    }
    
}
