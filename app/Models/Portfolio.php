<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title', 'body', 'public' , 'views', 'textPreview'
    ];

    public function photos()
    {
        return $this->morphMany('App\MOdels\Photo', 'imageable');
    }

}
