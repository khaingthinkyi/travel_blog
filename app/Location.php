<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'title', 'photo','city_id'
    ];
    public function city(){
    	return $this->belongsTo('App\City');
    }
    public function posts()
  {
  	return $this->hasMany('App\Post');
  }
}
