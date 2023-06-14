<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            $partner = DB::table('partners as b')
                ->join('pages as p', 'b.id', '=', 'p.page_group_id')
                ->select(DB::raw('b.id as partner_id,b.name as partner_name, b.title, b.description, b.banner, b.banner_alt_text,b.logo,b.short_description,b.top_image, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
                ->where('p.id', '=', $this->pages->id)
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
                return response()->json(['response' => 'Success'], 200);
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
}
