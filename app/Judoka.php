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
        return $this->hasMany(Category::class); 
    }
    public function competitors()
    {
        return $this->hasMany(Competitor::class); 
    }
}
