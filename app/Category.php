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
}
