<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Page;
use App\Models\User;
use App\Models\Story;
use Illuminate\Support\Str;
use App\Models\StoryComment;
use Illuminate\Http\Request;
use App\Mail\NewStorySubmitted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use App\Mail\StorySubmissionConfirmation;
use Illuminate\Support\Facades\Validator;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.stories.index')->with([
            'page_title' => 'Stories',
        ]);
    }

    public function comments()
    {
        return view('backend.stories.comments')->with([
            'page_title' => 'Story Comments',
        ]);
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
            $meta->og_author = $request->author_name;

            try {
                DB::transaction(function () use ($story, $meta,$request) {
                    $story->save();
                    $meta->page_group_id = $story->id;
                    $meta->name = "stories." . $story->id . lcfirst(str_replace(' ', '', ucwords($request->title)));
                    $meta->url = "/stories/" . $story->id . "-" . Str::slug($request->title);
                    $meta->save();

                    $authorPage = Page::where(['page_group' => 'auhtor', 'page_group_id' => Auth::id()])->first();
                    if (empty($authorPage)) {
                        $authorMeta = new Page;
                        $authorMeta->page_group = 'auhtor';
                        $authorMeta->page_group_id = Auth::id();
                        $authorMeta->name = "authors." . lcfirst(str_replace(' ', '', ucwords(Auth::user()->name)));
                        $authorMeta->url = "/authors/" . Str::slug(Auth::user()->name);
                        $authorMeta->page_title = Auth::user()->name;
                        $authorMeta->meta_title = Auth::user()->name;
                        $authorMeta->meta_keywords = Auth::user()->name . ", History Chip, History Chip Author";
                        $authorMeta->meta_description = "History Chip offers lot of interesting stories to read online. Read short stories, inspirational stories, brand stories, success stories everything. Read a story now written by the author " . Auth::user()->name;
                        $authorMeta->og_author = 'History Chip';
                        $authorMeta->save();
                    }
                    $this->SendStorySubmissionConfirmationMail($meta->url);
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

    public function SendStorySubmissionConfirmationMail2Way($url){
        $user = Auth::user();
        $details = [
            'title' => 'Story Submission Acknowledgement From History Chip',
            'theBody' => 'Thank you for submitting your story, we will review it and send an email when published.',
            'theComment' => "",
            'signature' => 'Jean McGavin',
        ];
        $details_admin = [
            'title' => 'New Story has been submitted in Historychip',
            'name' => $user->name,
            'email' => $user->email,
            'url' => $url
        ];

        Mail::to($user->email)->send(new StorySubmissionConfirmation($details));
        Mail::to('jean@historychip.com')->send(new NewStorySubmitted($details_admin));
        Session::flash('success', 'Story Submitted Successfully');
    }

    public function LoadApproveStoryDataTable(Request $request)
    {
        $url = 'stories';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'title',
            'author_id',
            'created_at',
            'approval_date_time',
            'approved_by',
            'approval_date_time',
            'status',
        );

        // Build the DataTables response
        $data = DataTables::of(Story::select($columns)->where('is_approved', '=', 1))
            ->addColumn('serial', function ($row) {
                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })

            ->addColumn('author', function ($row) {
                $user = User::where('id', $row->author_id)->first();
                return $user->name;
            })
            ->addColumn('approval', function ($row) {
                $user = User::where('id', $row->approved_by)->first();
                return ($user)?$user->name:'';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<a href="' . route('admin.blogs.edit', $row->id) . '" data-toggle="tooltip" title="Edit" class="edit btn btn-outline-primary btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->editColumn('created_at', function ($row) {
                return ($row->created_at) ? date('Y-m-d H:i', strtotime($row->created_at)) : '';
            })
            ->editColumn('approval_date_time', function ($row) {
                return ($row->approval_date_time) ? date('Y-m-d H:i', strtotime($row->approval_date_time)) : '';
            })

            ->rawColumns(['serial', 'author', 'action', 'status', 'approval'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function LoadFeaturedStoryDataTable(Request $request)
    {
        $url = 'stories';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'title',
            'author_id',
            'created_at',
            'approved_by',
            'approval_date_time',
        );

        // Build the DataTables response
        $data = DataTables::of(Story::select($columns)->where('is_approved', '=', 1)->where('is_featured', '=', 1))
            ->addColumn('serial', function ($row) {
                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('approval', function ($row) {
                $user = User::where('id', $row->approved_by)->first();
                return ($user)?$user->name:'';

            })
            ->addColumn('author', function ($row) {
                $user = User::where('id', $row->author_id)->first();
                return $user->name;
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<a href="' . route('admin.blogs.edit', $row->id) . '" data-toggle="tooltip" title="Edit" class="edit btn btn-outline-primary btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->editColumn('created_at', function ($row) {
                return ($row->created_at) ? date('Y-m-d H:i', strtotime($row->created_at)) : '';
            })
            ->editColumn('approval_date_time', function ($row) {
                return ($row->approval_date_time) ? date('Y-m-d H:i', strtotime($row->approval_date_time)) : '';
            })
            // ->addColumn('blog_description', function ($row) {
            //     return mb_strimwidth(strip_tags($row->blog_description), 0, 50, "...");
            // })

            ->rawColumns(['serial', 'author', 'action', 'approval'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function LoadWaitingStoryDataTable(Request $request)
    {
        $url = 'stories';
        // Define the columns to be fetched

        $columns = array(
            'id',
            'title',
            'author_id',
            'created_at',
        );

        // Define the search columns

        // Build the DataTables response
        $data = DataTables::of(Story::select($columns)->where('is_approved', '=', 0))
            ->addColumn('serial', function ($row) {
                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('author', function ($row) {
                return User::where('id', $row->author_id)->first()->name;
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<a href="' . route('admin.blogs.edit', $row->id) . '" data-toggle="tooltip" title="Edit" class="edit btn btn-outline-primary btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';
                return $buttons;
            })
            ->editColumn('created_at', function ($row) {
                return ($row->created_at) ? date('Y-m-d H:i', strtotime($row->created_at)) : '';
            })
            ->rawColumns(['serial', 'author', 'action'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function LoadRejectedStoryDataTable(Request $request)
    {
        $url = 'stories';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'title',
            'author_id',
            'created_at',
            'approval_date_time',
            'approved_by',
            'approval_date_time',
            'status',
        );

        // Build the DataTables response
        $data = DataTables::of(Story::select($columns)->where('is_approved', '=', 2))
            ->addColumn('serial', function ($row) {
                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })

            ->addColumn('author', function ($row) {
                $user = User::where('id', $row->author_id)->first();
                return $user->name;
            })
            ->addColumn('approval', function ($row) {
                $user = User::where('id', $row->approved_by)->first();
                return ($user)?$user->name:'';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<a href="' . route('admin.blogs.edit', $row->id) . '" data-toggle="tooltip" title="Edit" class="edit btn btn-outline-primary btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->editColumn('created_at', function ($row) {
                return ($row->created_at) ? date('Y-m-d H:i', strtotime($row->created_at)) : '';
            })
            ->editColumn('approval_date_time', function ($row) {
                return ($row->approval_date_time) ? date('Y-m-d H:i', strtotime($row->approval_date_time)) : '';
            })

            ->rawColumns(['serial', 'author', 'action', 'status', 'approval'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function LoadDraftedStoryDataTable(Request $request)
    {
        $url = 'stories';
        // Define the columns to be fetched

        $columns = array(
            'id',
            'title',
            'author_id',
            'created_at',
        );

        // Define the search columns

        // Build the DataTables response
        $data = DataTables::of(Story::select($columns)->where('is_draft', '=', 1))
            ->addColumn('serial', function ($row) {
                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('author', function ($row) {
                return User::where('id', $row->author_id)->first()->name;
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<a href="' . route('admin.blogs.edit', $row->id) . '" data-toggle="tooltip" title="Edit" class="edit btn btn-outline-primary btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';
                return $buttons;
            })
            ->editColumn('created_at', function ($row) {
                return ($row->created_at) ? date('Y-m-d H:i', strtotime($row->created_at)) : '';
            })
            ->rawColumns(['serial', 'author', 'action'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function LoadApproveCommentDataTable(Request $request)
    {
        $url = 'comments';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'user_id',
            'story_id',
            'created_at',
            'accepted_by',
            'accepted',
            'accepting_date_time',
            'comment',
            'updated_at'
        );
        // Build the DataTables response
        $data = DataTables::of(StoryComment::select($columns)->where('accepted', '=', 1)->with('story.author_details','commenteter','accepter'))
            ->addColumn('serial', function ($row) {
                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('story_title', function ($row) {

                return $row->story->title;
            })
            ->addColumn('story_author', function ($row) {

                return $row->story->author_details->name;
            })
            ->addColumn('commentator', function ($row) {
                return $row->commenteter->name;
            })
            ->addColumn('approval', function ($row) {
                return $row->accepter->name??'';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<a href="' . route('admin.blogs.edit', $row->id) . '" data-toggle="tooltip" title="Edit" class="edit btn btn-outline-primary btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->editColumn('created_at', function ($row) {
                return ($row->created_at) ? date('Y-m-d H:i', strtotime($row->created_at)) : '';
            })
            ->editColumn('accepting_date_time', function ($row) {
                return ($row->accepting_date_time) ? date('Y-m-d H:i', strtotime($row->accepting_date_time)) : '';
            })

            ->rawColumns(['serial','story_title', 'story_author','commentator', 'action', 'approval'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function LoadWaitingCommentDataTable(Request $request)
    {
        $url = 'comments';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'user_id',
            'story_id',
            'comment',
            'created_at',
            'updated_at'
        );
        // Build the DataTables response
        $data = DataTables::of(StoryComment::select($columns)->where('accepted', '=', 0)->with('story.author_details','commentator','accepter'))
            ->addColumn('serial', function ($row) {
                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('story_title', function ($row) {

                return $row->story->title;
            })
            ->addColumn('story_author', function ($row) {

                return $row->story->author_details->name;
            })
            ->addColumn('commentator', function ($row) {
                return $row->commentator->name;
            })

            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<a href="' . route('admin.blogs.edit', $row->id) . '" data-toggle="tooltip" title="Edit" class="edit btn btn-outline-primary btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->editColumn('created_at', function ($row) {
                return ($row->created_at) ? date('Y-m-d H:i', strtotime($row->created_at)) : '';
            })


            ->rawColumns(['serial','story_title', 'story_author','commentator', 'action', 'approval'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function LoadRejectedCommentDataTable(Request $request)
    {
        $url = 'comments';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'user_id',
            'story_id',
            'created_at',
            'accepted_by',
            'accepted',
            'accepting_date_time',
            'comment',
            'updated_at'
        );
        // Build the DataTables response
        $data = DataTables::of(StoryComment::select($columns)->where('accepted', '=', 2)->with('story.author_details','commenteter','accepter'))
            ->addColumn('serial', function ($row) {
                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('story_title', function ($row) {

                return $row->story->title;
            })
            ->addColumn('story_author', function ($row) {

                return $row->story->author_details->name;
            })
            ->addColumn('commentator', function ($row) {
                return $row->story->commenteter->name;
            })
            ->addColumn('approval', function ($row) {
                return $row->story->accepter->name??'';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<a href="' . route('admin.blogs.edit', $row->id) . '" data-toggle="tooltip" title="Edit" class="edit btn btn-outline-primary btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->editColumn('created_at', function ($row) {
                return ($row->created_at) ? date('Y-m-d H:i', strtotime($row->created_at)) : '';
            })
            ->editColumn('accepting_date_time', function ($row) {
                return ($row->accepting_date_time) ? date('Y-m-d H:i', strtotime($row->accepting_date_time)) : '';
            })

            ->rawColumns(['serial','story_title', 'story_author','commentator', 'action', 'approval'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }


}
