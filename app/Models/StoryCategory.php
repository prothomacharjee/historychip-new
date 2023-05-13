<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryCategory extends Model
{
    protected $guarded = [];

    public function sub_category()
    {
        return $this->hasMany(StoryCategory::class, 'parent_id', 'id');
    }

    public function parent_category()
    {
        return $this->belongsTo(StoryCategory::class, 'parent_id', 'id');
    }
}
