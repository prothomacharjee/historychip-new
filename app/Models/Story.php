<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $guarded = [];

    public function base_category(){
        return $this->belongsTo(StoryCategory::class,'category_id');
    }

    public function level1_category(){
        return $this->belongsTo(StoryCategory::class,'sub_category_id_level_1');
    }

    public function level2_category(){
        return $this->belongsTo(StoryCategory::class,'sub_category_id_level_2');
    }

    public function level3_category(){
        return $this->belongsTo(StoryCategory::class,'sub_category_id_level_3');
    }

    public function author_details(){
        return $this->belongsTo(User::class, 'author_id');
    }
}
