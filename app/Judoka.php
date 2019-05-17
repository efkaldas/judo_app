<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judoka extends Model
{
    // Table Name
    protected $table = 'judokas';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class); 
    }
    public function events()
    {
        return $this->belongsToMany('App\Event', 'category_event_judoka')->withPivot('event_id'); 
    }
}
