<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'name', 'text', 'status', 'answer', 'proven', 'answered_at'
    ];

    public const STATUS_WAIT = 'wait';
    public const STATUS_ACTIVE = 'active';

    protected $dates = ['answered_at'];

    public function isWait()
    {
    	return $this->status === 'wait';
    }

    public function isActive()
    {
    	return $this->status === 'active';
    }

    public function createdAtForHumans()
    {
        return $this->created_at->diffForHumans();
    }

    public function answeredAtForHumans()
    {
        return $this->answered_at->diffForHumans();
    }

    public function reviewsProvenCount()
    {
        return $this->where('status', 'active')->count();
    }
}
