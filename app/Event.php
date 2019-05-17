<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_event_judoka')->withPivot('category_id'); 
    }
    public function judokas()
    {
        return $this->belongsToMany('App\Judoka', 'category_event_judoka')->withPivot('judoka_id'); 
    }

}
