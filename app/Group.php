<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function events()
    {
        return $this->belongsToMany(Category::class);
    }
}
