<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'competitions')->withPivot('category_id'); 
    }
}
