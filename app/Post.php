<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'photo','content','location_id'
    ];
    public function location(){
    	return $this->belongsTo('App\Location');
    }
}
