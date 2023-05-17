<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Partner;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Anhskohbo\NoCaptcha\NoCaptcha;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserAuthController extends Controller
{
    use AuthenticatesUsers;

    // overriding the Trait
    protected $maxAttempts = 3;
    protected $decayMinutes = 5;

    public function showRegistrationForm()
    {
        $partners = Partner::where('status', 1)->get();
        return view('auth.register')->with([
            'page_title' => 'Register',
            'notices' => $this->notices,
            'partners' => $partners,
        ]);
    }

    // Login
    public function showLoginForm()
    {

        return view('auth.login')->with([
            'page_title' => 'Login',
            'notices' => $this->notices,
        ]);
    }

    public function login(Request $request)
    {

        // checking if too many attemps
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $seconds = $this->limiter()->availableIn(
                $this->throttleKey($request)
            );
            return redirect()->back()->with('error', "Too many login attempts. Please try again after $seconds seconds.");
        }

        // validation checking
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:18',
            'g-recaptcha-response' => 'required' //|captcha'
        ], [
            'g-recaptcha-response' => [
                'required' => 'Please verify that you are not a robot.',
                // 'captcha' => 'Captcha error! Try again later or contact site admin.',
            ]
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        } else {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // User is authenticated
                $this->clearLoginAttempts($request);
                return redirect()->intended('/');
            } else {
                // Check if email is registered
                $user = User::where('email', $credentials['email'])->first();
                if (!$user) {
                    // Notify user that email is not registered
                    $this->incrementLoginAttempts($request);

                    return redirect()->back()->with('error', "This Email is not registered in our system.");
                } else {
                    // Check if email is verified
                    if (!$user->hasVerifiedEmail()) {
                        // Send verification email
                        $user->sendEmailVerificationNotification();
                        return redirect()->back()->with('info', "Email is not verified. A verification email has been sent.");
                    } elseif ($user->is_available == 0) {
                        $this->incrementLoginAttempts($request);
                        return redirect()->back()->with('error', "Sorry! Account is temporary blocked.");
                    } else {
                        // Email is registered and verified, but password is incorrect
                        $this->incrementLoginAttempts($request);
                        return redirect()->back()->with('error', "Invalid Credentials.");
                    }
                }
            }
        }
    }

    public function register(Request $request)
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
                'g-recaptcha-response' => ['required'],
            ],
            [
                'sixteen.required' => 'Age requirement field is required',
                'g-recaptcha-response' => [
                    'required' => 'Please verify that you are not a robot.',
                    // 'captcha' => 'Captcha error! Try again later or contact site admin.',
                ]
            ]

        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();;
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
                    $userProfile->partner_id = ($request->partner_id != null) ? $request->partner_id : NULL;


                    $user->user_profile()->save($userProfile);

                    // Send verification email
                   // $user->sendEmailVerificationNotification();
                });
                return redirect()->route('login')->with('success', 'Please verify your email address to complete registration.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }




    }
}
