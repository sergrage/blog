<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    protected $fillable = [
        'title', 'body', 'public' , 'views'
    ];

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function photoCount()
    {
    	return $this->photos()->count();
    }

}
