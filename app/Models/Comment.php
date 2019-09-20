<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post; 

class Comment extends Model
{

	protected $fillable = [
        'name', 'text', 'status', 'answer', 'proven'
    ];

    public const STATUS_WAIT = 'wait';
    public const STATUS_ACTIVE = 'active';

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function isWait()
    {
    	return $this->status === 'wait';
    }

    public function isActive()
    {
    	return $this->status === 'active';
    }
}
