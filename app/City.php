<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name', 'photo'
    ];
    public function locations()
  {
  	return $this->hasMany('App\Location');
  }
  public function hotels()
  {
  	return $this->hasMany('App\Hotel');
  }
}
