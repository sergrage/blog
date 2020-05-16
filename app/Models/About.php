<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'body'
    ];

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }
}
