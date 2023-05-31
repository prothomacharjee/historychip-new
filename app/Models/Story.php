<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $guarded = [];

    public function base_category()
    {
        return $this->belongsTo(StoryCategory::class, 'category_id');
    }

    public function level1_category()
    {
        return $this->belongsTo(StoryCategory::class, 'sub_category_id_level_1');
    }

    public function level2_category()
    {
        return $this->belongsTo(StoryCategory::class, 'sub_category_id_level_2');
    }

    public function level3_category()
    {
        return $this->belongsTo(StoryCategory::class, 'sub_category_id_level_3');
    }

    public function author_details()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function approval_details()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }


    public function comments()
    {
        return $this->hasMany(Story::class, 'story_id');
    }





    public function contextForDisplay()
    {
        $cleanString = trim($this->context);

        // Remove inverted commas
        $cleanString = str_replace('“', '', $cleanString);
        $cleanString = str_replace('”', '', $cleanString);

        // Remove consecutive spaces
        $cleanString = preg_replace('/\s+/', ' ', $cleanString);

        return $cleanString;
    }

    public static function FetchSingleStory($slug = null)
    {
        return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
                ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
                ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
                ->where('p.page_group', '=', 'story')
                ->where('p.page_group_id', '=', $slug)
                ->where(['stories.id' => $slug])
                ->first();
    }

    public static function FetchAllStory(){
        return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
        ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
        ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
        ->where('p.page_group', '=', 'story')
        ->where(['stories.status' => 1, 'stories.is_approved' => 1, 'stories.is_draft' => 0])->latest()
        ->paginate(12);
    }

    public static function FetchStoryByAuthorIDAndApprovalType($author_id, $paginated_number=9, $is_approved){

        return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
        ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
        ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
        ->where('stories.author_id', '=', $author_id)
        ->where('p.page_group', '=', 'story')
        ->where('stories.is_approved', '=', $is_approved)
        ->where('stories.is_draft', '<>', 1)->latest()
        ->paginate($paginated_number);
    }

    public static function FetchDraftStoryByAuthorID($author_id, $paginated_number=9, $is_draft){

        return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
        ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
        ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
        ->where('stories.author_id', '=', $author_id)
        ->where('p.page_group', '=', 'story')
        ->where('stories.is_draft', '=', $is_draft)->latest()
        ->paginate($paginated_number);
    }

    public static function FetchAllFeaturedStory(){
        return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
        ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
        ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
        ->where('p.page_group', '=', 'story')
        ->where(['stories.status' => 1, 'stories.is_featured' => 1])->latest()
        ->get();
    }



}
