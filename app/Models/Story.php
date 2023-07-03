<?php

namespace App\Models;

use App\Models\StoryCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class Story extends Model
{
    protected $guarded = [];

    use Searchable;

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

    public static function FetchAllStory()
    {
        return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
            ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
            ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
            ->where('p.page_group', '=', 'story')
            ->where(['stories.status' => 1, 'stories.is_approved' => 1, 'stories.is_draft' => 0])->latest()
            ->paginate(12);
    }

    public static function FetchStoryByAuthorIDAndApprovalType($author_id, $paginated_number = 9, $is_approved)
    {

        return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
            ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
            ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
            ->where('stories.author_id', '=', $author_id)
            ->where('p.page_group', '=', 'story')
            ->where('stories.is_approved', '=', $is_approved)
            ->where('stories.is_draft', '<>', 1)->latest()
            ->paginate($paginated_number);
    }

    public static function FetchDraftStoryByAuthorID($author_id, $paginated_number = 9, $is_draft)
    {

        return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
            ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
            ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
            ->where('stories.author_id', '=', $author_id)
            ->where('p.page_group', '=', 'story')
            ->where('stories.is_draft', '=', $is_draft)->latest()
            ->paginate($paginated_number);
    }

    public static function FetchAllFeaturedStory()
    {
        return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
            ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
            ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
            ->where('p.page_group', '=', 'story')
            ->where(['stories.status' => 1, 'stories.is_featured' => 1])->latest()
            ->get();
    }

    // public static function ProcessSearchResults($ids, $paginated_number = 9)
    // {
    //     return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
    //         ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
    //         ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
    //         ->where('p.page_group', '=', 'story')
    //         ->whereIn('p.page_group_id', $ids)
    //         ->whereIn('stories.id', $ids)
    //         ->paginate($paginated_number);
    // }

    public static function ProcessSearchResults($keyword)
    {
        return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
            ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
            ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
            ->where('p.page_group', '=', 'story')
            ->where('is_approved', 1)
            ->where('is_draft', 0)
            ->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('context', 'like', '%' . $keyword . '%')
                    ->orWhere('tags', 'like', '%' . $keyword . '%');
            })
            ->get();
    }

    public static function ProcessSearchResultsByCategory($category_id, $sub_category_id_level_1 = '')
    {
        if($sub_category_id_level_1!=''){
            return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
            ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
            ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
            ->where('p.page_group', '=', 'story')
            ->where('is_approved', 1)
            ->where('is_draft', 0)
            ->where('category_id', 'like', '%"' . $category_id . '"%')
            ->where('sub_category_id_level_1', 'like', '%"' . $sub_category_id_level_1 . '"%')
            ->get();
        }
        else{
            return Story::with('base_category', 'level1_category', 'level2_category', 'level3_category', 'author_details')
            ->join('pages as p', 'stories.id', '=', 'p.page_group_id')
            ->select(DB::raw('stories.*, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
            ->where('p.page_group', '=', 'story')
            ->where('is_approved', 1)
            ->where('is_draft', 0)
            ->where('category_id', 'like', '%"' . $category_id . '"%')
            ->get();
        }

    }

    // public function toSearchableArray()
    // {
    //     if ($this->category_id != null) {

    //         $categoryNames = StoryCategory::whereIn('id', json_decode($this->category_id))->where('level', 0)->pluck('name')->toArray();
    //     } else {
    //         $categoryNames = null;
    //     }

    //     if ($this->sub_category_id_level_1 != null) {

    //         $subCategoryNamesLevel1 = StoryCategory::whereIn('id', json_decode($this->sub_category_id_level_1))->where('level', 1)->pluck('name')->toArray();
    //     } else {
    //         $subCategoryNamesLevel1 = null;
    //     }

    //     $cleanString = trim($this->context);

    //     // Remove inverted commas
    //     $cleanString = str_replace('“', '', $cleanString);
    //     $cleanString = str_replace('”', '', $cleanString);

    //     // Remove consecutive spaces
    //     $cleanString = preg_replace('/\s+/', ' ', $cleanString);

    //     //$context = preg_replace('/[\x00-\x1F\x7F]/u', '', strip_tags($this->context));
    //     // $compressedContext = gzcompress($context, 9);
    //     // $encodedContext = base64_encode($compressedContext);

    //     // Calculate the size of the record
    //     $recordSize = $this->calculateRecordSize();

    //     if ($this->is_draft == 1) {
    //         return [];
    //     }

    //     if ($this->is_approved == 0) {
    //         return [];
    //     }

    //     //If the record size exceeds the limit, return an empty array
    //     if ($recordSize > 10000) {
    //         // return [];

    //         //$truncatedContext = strlen($this->context) > 200 ? substr($this->context, 0, 200) . '...' : $this->context;
    //         // $trimmedString = substr($this->context, 0, strlen($this->context) - 100);
    //         // return [
    //         //     'id' => $this->id,
    //         //     'story_id' => $this->id,
    //         //     'title' => $this->title,
    //         //     'context' => $trimmedString,
    //         //     'category_name' => $categoryNames,
    //         //     'sub_category_name_level_1' => $subCategoryNamesLevel1,
    //         //     'author_name' => $this->author_name,
    //         //     'tags' => $this->tags,
    //         // ];

    //         $resultArray = str_split(strip_tags($cleanString), 100);
    //         if(count($resultArray) > 0){
    //             foreach ($resultArray as $index => $paragraph) {
    //                 // Create a unique identifier for each paragraph
    //                 $identifier = $this->id . '_' . ($index + 1);

    //                 // Compress the paragraph
    //                 // $compressedParagraph = gzcompress($paragraph, 9);
    //                 // $encodedParagraph = base64_encode($compressedParagraph);

    //                 // Create a new record for each paragraph
    //                 // if (!mb_detect_encoding($paragraph, 'UTF-8', true)) {
    //                 //     $inputString = mb_convert_encoding($paragraph, 'UTF-8');
    //                 // }
    //                 // else{
    //                 //     $inputString = $paragraph;
    //                 // }
    //                 $record = [
    //                     'id' => $identifier,
    //                     'story_id' => $this->id,
    //                     'title' => $this->title,
    //                     'context' => preg_replace('/[^\x00-\x7F]+/u', '', $paragraph),
    //                     'category_name' => $categoryNames,
    //                     'sub_category_name_level_1' => $subCategoryNamesLevel1,
    //                     'author_name' => $this->author_name,
    //                     'tags' => $this->tags,
    //                 ];

    //                 $searchableArray[] = $record;
    //             }
    //             return  $searchableArray;
    //         }
    //         else{
    //             return [];
    //         }

    //     }

    //     // $encodedSize = strlen($context);

    //     // If the encoded size exceeds the limit, return an empty array
    //     // if ($encodedSize > 10000) {
    //     //     // $truncatedContext = strlen($this->context) > 200 ? substr($this->context, 0, 200) . '...' : $this->context;
    //     //     $trimmedString = substr($this->context, 0, strlen($this->context) - 50);
    //     //     return [
    //     //         'id' => $this->id,
    //     //         'title' => $this->title,
    //     //         'context' => $trimmedString,
    //     //         'category_name' => $categoryNames,
    //     //         // 'sub_category_name_level_1' => $subCategoryNamesLevel1,
    //     //         'author_name' => $this->author_name,
    //     //         'tags' => $this->tags,
    //     //     ];
    //     // }

    //     return [
    //         'id' => $this->id,
    //         'story_id' => $this->id,
    //         'title' => $this->title,
    //         'context' => strip_tags($cleanString),
    //         'category_name' => $categoryNames,
    //         'sub_category_name_level_1' => $subCategoryNamesLevel1,
    //         'author_name' => $this->author_name,
    //         'tags' => $this->tags,
    //     ];
    // }

    // public function toSearchableArray()
    // {
    //     $searchableArray = [];

    //     if ($this->category_id != null) {
    //         $categoryNames = StoryCategory::whereIn('id', json_decode($this->category_id))->where('level', 0)->pluck('name')->toArray();
    //     } else {
    //         $categoryNames = null;
    //     }

    //     if ($this->sub_category_id_level_1 != null) {
    //         $subCategoryNamesLevel1 = StoryCategory::whereIn('id', json_decode($this->sub_category_id_level_1))->where('level', 1)->pluck('name')->toArray();
    //     } else {
    //         $subCategoryNamesLevel1 = null;
    //     }

    //     // Split the context into smaller pieces (e.g., paragraphs)
    //     $paragraphs = explode("\n\n", strip_tags($this->context));

    //     foreach ($paragraphs as $index => $paragraph) {
    //         // Create a unique identifier for each paragraph
    //         $identifier = $this->id . '_' . ($index + 1);

    //         // Compress the paragraph
    //         $compressedParagraph = gzcompress($paragraph, 9);
    //         $encodedParagraph = base64_encode($compressedParagraph);

    //         // Create a new record for each paragraph
    //         $record = [
    //             'id' => $identifier,
    //             'story_id' => $this->id,
    //             'title' => $this->title,
    //             'context' => $encodedParagraph,
    //             'category_name' => $categoryNames,
    //             // 'sub_category_name_level_1' => $subCategoryNamesLevel1,
    //             'author_name' => $this->author_name,
    //             'tags' => $this->tags,
    //         ];

    //         $searchableArray[] = $record;
    //     }

    //     return $searchableArray;
    // }

    // public function toSearchableArray()
    // {
    //     if ($this->category_id != null) {
    //         $categoryNames = StoryCategory::whereIn('id', json_decode($this->category_id))
    //             ->where('level', 0)
    //             ->pluck('name')
    //             ->toArray();
    //     } else {
    //         $categoryNames = null;
    //     }

    //     if ($this->sub_category_id_level_1 != null) {
    //         $subCategoryNamesLevel1 = StoryCategory::whereIn('id', json_decode($this->sub_category_id_level_1))
    //             ->where('level', 1)
    //             ->pluck('name')
    //             ->toArray();
    //     } else {
    //         $subCategoryNamesLevel1 = null;
    //     }

    //     $cleanString = trim($this->context);
    //     $cleanString = str_replace(['“', '”'], '', $cleanString);
    //     $cleanString = preg_replace('/\s+/', ' ', $cleanString);
    //     $cleanString = strip_tags($cleanString);
    //     $cleanString = preg_replace('/[^\x00-\x7F]+/u', '', $cleanString);

    //     $recordSize = $this->calculateRecordSize($cleanString);

    //     if ($this->is_draft == 1 || $this->is_approved == 0 || $this->id == 359) {
    //         return [];
    //     }

    //     if ($recordSize > 10000) {

    //         // Calculate the length of the string
    //         $length = strlen($cleanString);

    //         // Calculate the size of each part
    //         $partSize = ceil($length / 5);

    //         // Split the string into three equal parts
    //         $parts = str_split($cleanString, $partSize);

    //         // $resultArray = str_split($cleanString, 10000);
    //         $searchableArray = [];

    //         foreach ($parts as $index => $paragraph) {
    //             $identifier = $this->id . '_' . ($index + 1);
    //             $record = [
    //                 'id' => $identifier,
    //                 'story_id' => $this->id,
    //                 'title' => $this->title,
    //                 'context' => $paragraph,
    //                 'category_name' => $categoryNames,
    //                 'sub_category_name_level_1' => $subCategoryNamesLevel1,
    //                 'author_name' => $this->author_name,
    //                 'tags' => $this->tags,
    //             ];

    //             $this->searchable($record);
    //         }

    //         return [];
    //     }

    //     return [
    //         'id' => $this->id,
    //         'story_id' => $this->id,
    //         'title' => $this->title,
    //         'context' => $cleanString,
    //         'category_name' => $categoryNames,
    //         'sub_category_name_level_1' => $subCategoryNamesLevel1,
    //         'author_name' => $this->author_name,
    //         'tags' => $this->tags,
    //     ];
    // }

    // public function toSearchableArray()
    // {
    //     if ($this->category_id != null) {
    //         $categoryNames = StoryCategory::whereIn('id', json_decode($this->category_id))
    //             ->where('level', 0)
    //             ->pluck('name')
    //             ->toArray();
    //     } else {
    //         $categoryNames = null;
    //     }

    //     if ($this->sub_category_id_level_1 != null) {
    //         $subCategoryNamesLevel1 = StoryCategory::whereIn('id', json_decode($this->sub_category_id_level_1))
    //             ->where('level', 1)
    //             ->pluck('name')
    //             ->toArray();
    //     } else {
    //         $subCategoryNamesLevel1 = null;
    //     }

    //     $cleanString = trim($this->context);
    //     $cleanString = str_replace(['“', '”'], '', $cleanString);
    //     $cleanString = preg_replace('/\s+/', ' ', $cleanString);
    //     $cleanString = strip_tags($cleanString);
    //     $cleanString = preg_replace('/[^\x00-\x7F]+/u', '', $cleanString);

    //     $recordSize = $this->calculateRecordSize($cleanString);

    //     $records = [];

    //     // Split the string into multiple parts and create separate records
    //     if ($recordSize > 10000) {
    //         //  Calculate the length of the string
    //         $length = strlen($cleanString);

    //         // Calculate the size of each part
    //         $partSize = ceil($length / 10);

    //         // Split the string into three equal parts
    //         $parts = str_split($cleanString, $partSize);
    //         // $parts = str_split($cleanString, 1000);

    //         foreach ($parts as $index => $paragraph) {
    //             $identifier = $this->id . '_' . ($index + 1);
    //             $record = [
    //                 'id' => $identifier,
    //                 'story_id' => $this->id,
    //                 'title' => $this->title,
    //                 'context' => $paragraph,
    //                 'category_name' => $categoryNames,
    //                 'sub_category_name_level_1' => $subCategoryNamesLevel1,
    //                 'author_name' => $this->author_name,
    //                 'tags' => $this->tags,
    //             ];

    //             yield $record;
    //         }
    //         // $records = collect($records)->toArray();

    //     } else {
    //         // Add the main record
    //         $mainRecord = [
    //             'id' => $this->id,
    //             'story_id' => $this->id,
    //             'title' => $this->title,
    //             'context' => $cleanString,
    //             'category_name' => $categoryNames,
    //             'sub_category_name_level_1' => $subCategoryNamesLevel1,
    //             'author_name' => $this->author_name,
    //             'tags' => $this->tags,
    //         ];

    //         $records[] = $mainRecord;
    //     }

    //     // Return all rows

    //     dd($records);
    //     return $records;
    // }

    private function calculateRecordSize($cleanString)
    {
        $recordSize = mb_strlen(serialize($cleanString), '8bit');

        return $recordSize;
    }
}
