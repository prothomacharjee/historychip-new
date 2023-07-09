<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoryComment extends Model
{
    protected $guarded = [];

    public function commentator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function accepter()
    {
        return $this->belongsTo(Admin::class, 'accepted_by');
    }

    public function story()
    {
        return $this->belongsTo(Story::class, 'story_id');
    }
}
