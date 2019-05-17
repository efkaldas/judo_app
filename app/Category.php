<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function events()
    {
        return $this->belongsToMany('App\Event', 'category_event_judoka')->withPivot('event_id'); 
    }
    public function judokas()
    {
        return $this->belongsToMany('App\Judoka', 'category_event_judoka')->withPivot('judoka_id'); 
    }
    public function getName()
    {
        return name;
    }
}
