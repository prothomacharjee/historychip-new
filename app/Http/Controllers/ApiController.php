<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use App\Models\Story;
use App\Models\Partner;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use App\Models\StoryComment;
use Illuminate\Http\Request;
use App\Mail\NewStorySubmitted;
use App\Helpers\SoftSourceHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\StorySubmissionConfirmation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ApiController extends Controller
{
    use AuthenticatesUsers;

    // overriding the Trait
    protected $maxAttempts = 3;
    protected $decayMinutes = 5;

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

    public function api_partners($slug = null)
    {
        if ($slug) {
            $url = '/partners/' . $slug;

            $partner = DB::table('partners as b')
                ->join('pages as p', 'b.id', '=', 'p.page_group_id')
                ->select(DB::raw('b.id as partner_id,b.name as partner_name, b.title, b.description, b.banner, b.banner_alt_text,b.logo,b.short_description,b.top_image, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
                ->where('p.url', '=', $url)
                ->where('b.status', '=', 1)
                ->first();

            $partnerimages = Partner::findOrFail($partner->partner_id)->load('partner_image', 'partner_type');

            // Prepare the response data
            $response = [
                'partner' => $partner,
                'partnerimages' => $partnerimages,
            ];
            return response()->json($response);
        } else {
            // Same code as in your original function, but without the view rendering
            $partners = DB::table('partners as b')
                ->join('pages as p', 'b.id', '=', 'p.page_group_id')
                ->select(DB::raw('b.id as partner_id, b.title, b.description, b.banner, b.banner_alt_text, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
                ->where('p.page_group', '=', 'partner')
                ->where('b.status', '=', 1)
                ->paginate(20);

            // Prepare the response data
            $response = [
                'partners' => $partners,
            ];

            return response()->json($response);
        }
    }

    public function api_login(Request $request)
    {

        // checking if too many attempts
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $seconds = $this->limiter()->availableIn(
                $this->throttleKey($request)
            );
            return response()->json(['response' => "Too many login attempts. Please try again after $seconds seconds."], 429);
        }

        // validation checking
        $validation = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|string|min:8|max:18',
                //'g-recaptcha-response' => 'required' //|captcha'
            ],
            // [
            //     'g-recaptcha-response' => [
            //         'required' => 'Please verify that you are not a robot.',
            //         // 'captcha' => 'Captcha error! Try again later or contact site admin.',
            //     ]
            // ]
        );

        if ($validation->fails()) {
            return response()->json(['response' => $validation->errors()], 422);
        } else {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('web')->attempt($credentials, $request->get('remember'))) {
                // User is authenticated
                $this->clearLoginAttempts($request);
                return response()->json(['response' => 'Success', 'user_id' => Auth::id()], 200);
            } else {
                // Check if email is registered
                $user = User::where('email', $credentials['email'])->first();
                if (!$user) {
                    // Notify user that email is not registered
                    $this->incrementLoginAttempts($request);
                    return response()->json(['response' => "This Email is not registered in our system."], 422);
                } else {
                    // Check if email is verified
                    if (!$user->hasVerifiedEmail()) {
                        // Send verification email
                        $user->sendEmailVerificationNotification();
                        return response()->json(['response' => "Email is not verified. A verification email has been sent."], 200);
                    }
                    // elseif ($user->is_available == 0) {
                    //     $this->incrementLoginAttempts($request);
                    //     return response()->json(['error' => "Sorry! Account is temporarily blocked."], 422);
                    // }
                    else {
                        // Email is registered and verified, but the password is incorrect
                        $this->incrementLoginAttempts($request);
                        return response()->json(['response' => "Invalid Credentials."], 422);
                    }
                }
            }
        }
    }

    public function api_register(Request $request)
    {
        $validator = Validator::make(
            $request->except(['_token']),
            [
                'name' => ['required', 'string', 'max:255'],
                'pen_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'max:18', 'confirmed'],
                'password_confirmation' => ['required'],
                'city' => ['required'],
                'state' => ['required'],
                'country' => ['required'],
                'terms' => ['required'],
                'sixteen' => ['required'],
                // 'g-recaptcha-response' => ['required'],
            ],
            // [
            //     'sixteen.required' => 'Age requirement field is required',
            //     'g-recaptcha-response' => [
            //         'required' => 'Please verify that you are not a robot.',
            //         // 'captcha' => 'Captcha error! Try again later or contact site admin.',
            //     ],
            // ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {
            try {
                DB::transaction(function () use ($request) {
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ]);

                    $userProfile = new UserProfile;
                    $userProfile->city = $request->city;
                    $userProfile->pen_name = $request->pen_name;
                    $userProfile->state = $request->state;
                    $userProfile->country = $request->country;
                    $userProfile->bio = $request->bio;
                    $userProfile->partner_id = ($request->partner_id != null) ? $request->partner_id : null;

                    $user->user_profile()->save($userProfile);

                    // Send verification email
                    // $user->sendEmailVerificationNotification();
                });

                return response()->json(['message' => 'Please verify your email address to complete registration.'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function api_logout(Request $request)
    {
        $request->user('web')->token()->revoke();

        return response()->json(['response' => 'Successfully logged out']);
    }

    public function api_story_comments($story_id)
    {
        $comments = StoryComment::where('story_id', $story_id)->with('commentator', 'accepter')->get();
        return response()->json($comments);
    }

    public function api_write_story_comments(Request $request)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'story_id' => $request->input('storyId'),
            'comment' => $request->input('message'),
            'accepting_date_time' => null,
        ];

        try {
            DB::beginTransaction();

            $comment = StoryComment::create($data);

            DB::commit();

            return response()->json([
                'response' => true,
                'msg' => 'Your Comment is Posted. It will Show in the timeline after an Admin\'s Approval.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'response' => false,
                'msg' => $e->getMessage(),
            ], 500);
        }
    }

    public function api_save_update_story(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
            return response()->json([
                'response' => false,
                'errors' => $validator->errors(),
            ], 422);
        } else {
            try {
                DB::beginTransaction();

                $story = $request->id ? Story::findOrFail($request->id) : new Story;
                $meta = $request->id ? Page::where(['page_group' => 'story', 'page_group_id' => $request->id])->first() : new Page;

                $story->title = $request->input('title');
                $story->header_image_path = $request->input('header_image_path');
                $story->header_image_alt_text = $request->input('header_image_alt_text');
                $story->photo_credit = $request->input('photo_credit');
                $story->author_name = $request->input('author_name');
                $story->author_id = Auth::id();
                $story->tags = $request->input('tags');
                $story->category_id = json_encode($request->input('category_id'));
                $story->sub_category_id_level_1 = $request->input('sub_category_id_level_1') ? json_encode($request->input('sub_category_id_level_1')) : null;
                $story->sub_category_id_level_2 = $request->input('sub_category_id_level_2') ? json_encode($request->input('sub_category_id_level_2')) : null;
                $story->sub_category_id_level_3 = $request->input('sub_category_id_level_3') ? json_encode($request->input('sub_category_id_level_3')) : null;
                $story->is_anonymous = $request->input('is_anonymous');
                $story->context = $request->input('context');
                $story->audio_video_path = $request->input('audio_video_path');
                $story->is_audioconvert = $request->input('is_audioconvert');
                $story->audio_video_credit = $request->input('audio_video_credit');
                $story->event_location = $request->input('event_location');
                $story->event_detail_dates = $request->input('event_detail_dates');
                $story->event_dates = $request->input('event_dates');
                $story->is_draft = $request->input('is_draft');
                $story->edit_count = $request->id ? ($story->edit_count + 1) : 0;

                $meta->page_title = $request->input('title');
                $meta->page_group = 'story';
                $meta->meta_title = $request->input('title');
                $meta->meta_keywords = $request->input('tags');
                $meta->meta_description = strlen(strip_tags($request->input('context'))) > 100 ? substr(strip_tags($request->input('context')), 0, 100) . ' . . .' : strip_tags($request->input('context'));
                $meta->og_author = $request->input('author_name');

                $story->save();
                $meta->page_group_id = $story->id;
                $meta->name = "stories." . $story->id . lcfirst(str_replace(' ', '', ucwords($request->input('title'))));
                $meta->url = "/stories/" . $story->id . "-" . Str::slug($request->input('title'));
                $meta->save();

                $authorPage = Page::where(['page_group' => 'author', 'page_group_id' => Auth::id()])->first();
                if (empty($authorPage)) {
                    $authorMeta = new Page;
                    $authorMeta->page_group = 'author';
                    $authorMeta->page_group_id = Auth::id();
                    $authorMeta->name = "authors." . lcfirst(str_replace(' ', '', ucwords(Auth::user()->name)));
                    $authorMeta->url = "/authors/" . Str::slug(Auth::user()->name);
                    $authorMeta->page_title = Auth::user()->name;
                    $authorMeta->meta_title = Auth::user()->name;
                    $authorMeta->meta_keywords = Auth::user()->name . ", History Chip, History Chip Author";
                    $authorMeta->meta_description = "History Chip offers a lot of interesting stories to read online. Read short stories, inspirational stories, brand stories, success stories, and more. Read a story now written by the author " . Auth::user()->name;
                    $authorMeta->og_author = 'History Chip';
                    $authorMeta->save();
                }

                DB::commit();

                $this->SendStorySubmissionConfirmationMail($meta->url);

                return response()->json([
                    'response' => true,
                    'msg' => "Thank you for submitting your story, we will review it and send an email when published.",
                ]);
            } catch (\Exception $e) {
                DB::rollBack();

                return response()->json([
                    'response' => false,
                    'msg' => $e->getMessage(),
                ], 500);
            }
        }
    }

    public function SendStorySubmissionConfirmationMail2Way($url)
    {
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

    public function api_user_details($user_id)
    {
        $user = User::findOrFail($user_id)->load('user_profile');
        return response()->json($user);
    }

    public function updateProfile(Request $request)
    {
        $input = $request->except(['image_name', '_token']);
        $validator = Validator::make($input, [
            "id" => "required",
            "pen_name" => "required|string",
            "bio" => "nullable",
            "image_name" => 'nullable|file|max:2048|mimes:jpeg,png,svg,webp',
            "facebook_page_link" => "nullable",
            "twitter_page_link" => "nullable",
            "linkedin_page_link" => "nullable",
            "instagram_page_link" => "nullable",
            "phone" => "nullable",
            "city" => "nullable",
            "state" => "nullable",
            "country" => "nullable",
            "dob" => "nullable",
            "is_pic_public" => "required",
            "is_social_media_public" => "required",
            "is_bio_public" => "required",

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        } else {
            if ($request->id) {
                try {
                    $user = User::findOrFail(Auth::id())->load('user_profile');
                    $user->user_profile->pen_name = $request->pen_name;
                    $user->user_profile->bio = $request->bio;
                    $user->user_profile->facebook_page_link = $request->facebook_page_link;
                    $user->user_profile->twitter_page_link = $request->twitter_page_link;
                    $user->user_profile->linkedin_page_link = $request->linkedin_page_link;
                    $user->user_profile->instagram_page_link = $request->instagram_page_link;
                    $user->user_profile->phone = $request->phone;
                    $user->user_profile->city = $request->city;
                    $user->user_profile->state = $request->state;
                    $user->user_profile->country = $request->country;
                    $user->user_profile->dob = $request->dob;
                    $user->user_profile->is_pic_public = $request->is_pic_public;
                    $user->user_profile->is_social_media_public = $request->is_social_media_public;
                    $user->user_profile->is_bio_public = $request->is_bio_public;

                    if ($request->hasFile('image_name')) {
                        $user->user_profile->image = SoftSourceHelper::FileUploaderHelper($request->image_name, 'frontend/profiles');
                    }

                    DB::transaction(function () use ($user) {
                        $user->user_profile->save();
                    });

                    return response()->json(['success' => 'Profile Information Updated Successfully'], 200);
                } catch (\Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 500);
                }
            } else {
                return response()->json(['error' => 'Some Error Occurred. Please refresh the page and try again.'], 400);
            }
        }
    }


    public function api_author_stories($user_id)
    {
        $published_stories = Story::FetchStoryByAuthorIDAndApprovalType($user_id, 12, 1);
        $waiting_stories = Story::FetchStoryByAuthorIDAndApprovalType($user_id, 12, 0);
        $rejected_stories = Story::FetchStoryByAuthorIDAndApprovalType($user_id, 12, 2);
        $draft_stories = Story::FetchDraftStoryByAuthorID($user_id, 12, 1);

        return response()->json([
            'published_stories' => $published_stories,
            'waiting_stories' => $waiting_stories,
            'rejected_stories' => $rejected_stories,
            'draft_stories' => $draft_stories,
        ]);
    }
}
