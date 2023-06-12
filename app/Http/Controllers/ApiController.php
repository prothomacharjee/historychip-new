<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Story;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function api_read_story($slug = null)
    {
        if ($slug) {

            $slugParts = explode('-', $slug);
            $firstWord = $slugParts[0];
            $stories = Story::FetchSingleStory($firstWord);
        } else {
            $stories = Story::FetchAllStory();
            //return response()->json($stories);
        }
        return response()->json($stories);
    }
}
