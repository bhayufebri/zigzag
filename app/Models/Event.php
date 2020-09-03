<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
       
        'name',
        'event_date_start' ,
        'event_date_end',
        'register_date_start',
        'register_date_end',      
        'venue',
        'location',
        'address',
        'latitude',
        'longitude',
        'city_id',
        'detail',
        'image',
        'image_header',
        'slug',
        'vendor_id',
        'event_category_id',
        'privacy',
        'barcode',
        'status',
        'is_paid',
        'contact_detail',
        'additional_order_message'
];

    public function event_category(){
        return $this->belongsTo('App\Models\Event_category');
    }
    public function event_schedule(){
        return $this->hasMany('App\Models\Event_schedule');
    }
    public function event_time(){
        return $this->hasMany('App\Models\Event_time');
    }
    // public function ticket(){
    //     return $this->hasMany('App\Models\Ticket');
    // }
    public function vendor(){
        return $this->belongsTo('App\Models\Vendor');
    }
}
