<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    public function judokas()
    {
        return $this->belongsTo(Judoka::class, 'judoka_id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function groups()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
