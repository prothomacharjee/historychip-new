<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Page;
use App\Models\Story;
use Illuminate\Support\Str;
use App\Models\StoryComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->except(['_token']), [
            "title" => "required",
            "author_name" => "required",
            "category_id" => "required",
            "context" => "required|string|min:500|max:12000",
            "event_location" => "required",
            "event_detail_dates" => "required",
            'header_image_path' => 'nullable',
            'photo_credit' => 'required_if:header_image_path,!=,',
            'audio_video_path' => 'nullable',
            'audio_video_credit' => 'required_if:audio_video_path,!=,',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $story = $request->id ? Story::findOrFail($request->id) : new Story;
            $meta = $request->id ? Page::where(['page_group' => 'story', 'page_group_id' => $request->id]) : new Page;

            $story->title = $request->title;
            $story->header_image_path = $request->header_image_path;
            $story->header_image_alt_text = $request->header_image_alt_text;
            $story->photo_credit = $request->photo_credit;
            $story->author_name = $request->author_name;
            $story->author_id = Auth::id();
            $story->tags = $request->tags;
            $story->category_id = json_encode($request->category_id);
            $story->sub_category_id_level_1 = (($request->sub_category_id_level_1) ? json_encode($request->sub_category_id_level_1) : null);
            $story->sub_category_id_level_2 = (($request->sub_category_id_level_2) ? json_encode($request->sub_category_id_level_2) : null);
            $story->sub_category_id_level_3 = (($request->sub_category_id_level_3) ? json_encode($request->sub_category_id_level_3) : null);
            $story->is_anonymous = $request->is_anonymous;
            $story->context = $request->context;
            $story->audio_video_path = $request->audio_video_path;
            $story->is_audioconvert = $request->is_audioconvert;
            $story->audio_video_credit = $request->audio_video_credit;
            $story->event_location = $request->event_location;
            $story->event_detail_dates = $request->event_detail_dates;
            $story->event_dates = $request->event_dates;
            $story->is_draft = $request->is_draft;
            $story->edit_count = $request->id ? ($story->edit_count + 1) : 0;

            $meta->page_title = $request->title;
            $meta->page_group = 'story';
            $meta->meta_title = $request->title;
            $meta->meta_keywords = $request->tags;
            $meta->meta_description = strlen(strip_tags($request->context)) > 100 ? substr(strip_tags($request->context), 0, 100) . ' . . .' : strip_tags($request->context);
            $meta->og_author = Auth::user()->name;

            try {
                DB::transaction(function () use ($story, $meta) {
                    $story->save();
                    $meta->page_group_id = $story->id;
                    $meta->name = "stories." . $story->id . lcfirst(str_replace(' ', '', ucwords($request->title)));
                    $meta->url = "stories/" . $story->id . "-" . Str::slug($request->title);
                    $meta->save();

                    $authorPage = Pages::where(['page_group' => 'auhtor', 'page_group_id' => Auth::id()])->first();
                    if (empty($authorPage)) {
                        $authorMeta = new Page;
                        $authorMeta->page_group = 'auhtor';
                        $authorMeta->page_group_id = Auth::id();
                        $authorMeta->name = "author." . lcfirst(str_replace(' ', '', ucwords(Auth::user()->name)));
                        $authorMeta->url = "author/" . Str::slug(Auth::user()->name);
                        $authorMeta->page_title = Auth::user()->name;
                        $authorMeta->meta_title = Auth::user()->name;
                        $authorMeta->meta_keywords = Auth::user()->name . ", History Chip, History Chip Author";
                        $authorMeta->meta_description = "History Chip offers lot of interesting stories to read online. Read short stories, inspirational stories, brand stories, success stories everything. Read a story now written by the author " . Auth::user()->name;
                        $authorMeta->og_author = 'History Chip';
                        $authorMeta->save();
                    }
                });
                return redirect()->route('my-stories')->with('success', "Thank you for submitting your story, we will review it and send an email when published.");
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Story $story)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
        //
    }

    public function save_comment(Request $request)
    {
        $data = array(
            'user_id' => auth()->user()->id,
            'story_id' => $request->storyId,
            'comment' => $request->message,
            'accepting_date_time' => null,
        );
        try {
            DB::transaction(function () use ($data) {
                $comment = StoryComment::create($data);
            });
            echo json_encode([
                'response' => true,
                'msg' => 'Your Comment is Posted. It will Show in the timeline after an Admin\'s Approval.',
            ]);
        } catch (Exception $e) {
            // return redirect()->back()->with('error', $e->getMessage());
            echo json_encode([
                'response' => false,
                'msg' => $e->getMessage(),
            ]);
        }

    }
}
