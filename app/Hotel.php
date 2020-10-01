<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name', 'photo','type','city_id'
    ];
    public function city(){
    	return $this->belongsTo('App\City');
    }
}
