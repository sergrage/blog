<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post; 


class Image extends Model
{
	protected $fillable = [
        'source', 'post_id'
    ];


    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
