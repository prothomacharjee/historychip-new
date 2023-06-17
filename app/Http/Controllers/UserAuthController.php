<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Partner;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\QuickRegister;
use App\Mail\QuickRegisterOTP;
use App\Mail\QuickRegisterSuccess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
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
            'meta' => $this->pages,
        ]);
    }

    // Login
    public function showLoginForm()
    {

        return view('auth.login')->with([
            'page_title' => 'Login',
            'notices' => $this->notices,
            'meta' => $this->pages,
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
            'g-recaptcha-response' => 'required', //|captcha'
        ], [
            'g-recaptcha-response' => [
                'required' => 'Please verify that you are not a robot.',
                // 'captcha' => 'Captcha error! Try again later or contact site admin.',
            ],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        } else {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('web')->attempt($credentials, $request->get('remember'))) {
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
                    }
                    // elseif ($user->is_available == 0) {
                    //     $this->incrementLoginAttempts($request);
                    //     return redirect()->back()->with('error', "Sorry! Account is temporary blocked.");
                    // }
                    else {
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
                ],
            ]

        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
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
                return redirect()->route('login')->with('success', 'Please verify your email address to complete registration.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function showResetPasswordForm()
    {

        return view('auth.passwords.email')->with([
            'page_title' => 'Reset',
            'notices' => $this->notices,
            'meta' => $this->pages,
        ]);
    }

    public function showQuickRegisterForm()
    {

        return view('auth.quick-register')->with([
            'page_title' => 'Quick Registration',
            'notices' => $this->notices,
            'meta' => $this->pages,
        ]);
    }

    public function showQuickRegisterOTPForm()
    {

        return view('auth.quick-register-otp')->with([
            'page_title' => 'Quick Registration Verification',
            'notices' => $this->notices,
            'meta' => $this->pages,
        ]);
    }

    public function quickRegister(Request $request)
    {
        $validator = Validator::make(
            $request->except(['_token']),
            [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ],
            [
                'email.unique' => 'This Email is already registered',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            try {
                $otp = mt_rand(100000, 999999);
                $user_id = 0;
                DB::transaction(function () use ($request, $otp, $user_id) {
                    $user = QuickRegister::create([
                        'email' => $request->email,
                        'otp' => $otp,
                    ]);

                    $user_id= $user->id;

                    $details = [
                        'otp' => $otp,
                        'signature' => 'Jean McGavin',
                    ];
                    Mail::to($request->email)->send(new QuickRegisterOTP($details));
                });

                return redirect()->route('quick-register.verify')->with(['success' => 'We have sent you an email with an OTP. Please verify your request', 'id' => $user_id]);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function quickRegisterSubmit(Request $request)
    {
        $validator = Validator::make(
            $request->except(['_token']),
            [
                'otp' => ['required', 'number', 'email', 'max:6'],
                'id' => ['required'],
            ],
            [
                'otp' => 'Please Enter your OTP',
                'id' => 'Please try again',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            try {

                $quick = QuickRegister::findOrFail($request->id);
                $randomPassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 12);

                if ($quick->otp == $request->otp) {
                    DB::transaction(function () use ($quick, $randomPassword) {
                        $user = User::create([
                            'name' => 'Anonymous ' . $quick->id,
                            'email' => $quick->email,
                            'password' => Hash::make($randomPassword),
                        ]);

                        $userProfile = new UserProfile;
                        // $userProfile->city = $request->city;
                        // $userProfile->pen_name = $request->pen_name;
                        // $userProfile->state = $request->state;
                        // $userProfile->country = $request->country;
                        // $userProfile->bio = $request->bio;
                        // $userProfile->partner_id = ($request->partner_id != null) ? $request->partner_id : null;

                        $user->user_profile()->save($userProfile);

                        $details = [
                            'email' => $quick->email,
                            'password' => $randomPassword,
                            'signature' => 'Jean McGavin',
                        ];
                        Mail::to($request->email)->send(new QuickRegisterSuccess($details));

                        $quick->delete();
                    });

                    return redirect()->route('login')->with('success', 'We have sent you an email with your credentials. Please change your default password after login.');
                } else {
                    return redirect()->back()->with('error', 'Please use a valid OTP.');
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

}
