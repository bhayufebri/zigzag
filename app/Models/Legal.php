<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Legal extends Model
{
    use SoftDeletes;
    public $timestamps = true; 
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'vendor_id','type','ktp_number','ktp_name','ktp_address','ktp_image','npwp_number','npwp_name','npwp_address','npwp_image'];
    public static $rules = [
        'type'          => 'required',
        'ktp_number'    => 'required',
        'ktp_name'      => 'required',
        'ktp_address'   => 'required',
        'ktp_image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'npwp_number'   => 'required',
        'npwp_name'     => 'required',
        'npwp_address'  => 'required',
        'npwp_image'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ];

public function vendor(){
        return $this->belongsTo('App\Models\Vendor');
        
    }
}
