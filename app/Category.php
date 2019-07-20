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
    public function judokas()
    {
        return $this->hasMany(Judoka::class);
    }
    public function competitors()
    {
        return $this->hasMany(Competitor::class);
    }
    
    public function getName()
    {
        return name;
    }
}
