<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Anhskohbo\NoCaptcha\NoCaptcha;
use Illuminate\Support\Facades\Hash;
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
        return view('auth.register')->with([
            'page_title' => 'Register',
            'notices' => $this->notices,
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
            'password' => 'required|string|min:6|max:18',
            'g-recaptcha-response' => 'required|captcha'
        ], [
            'g-recaptcha-response' => [
                'required' => 'Please verify that you are not a robot.',
                'captcha' => 'Captcha error! Try again later or contact site admin.',
            ]
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        } else {
            // getting data
            $user_data = User::where('email', $request->email)->first();

            // checking if has an account associate with this email
            if ($user_data == null) {
                $this->incrementLoginAttempts($request);
                return redirect()->back()->with('error', "This Email is not registered in our system.");
            }

            // check if the password is correct
            if (!(Hash::check($request->password, $user_data->password))) {
                $this->incrementLoginAttempts($request);
                return redirect()->back()->with('error', "Invalid credentials.");
            }

            // checking if the mail is verified, if not sending OTP
            if ($user_data->is_verified != 1) {
                try {
                    $otp = rand(100000, 999999);
                    session([
                        'email' => $user_data->email,
                    ]);

                    User::where('email', $request->email)
                        ->update([
                            'otp' => $otp,
                            'is_verified' => 0,
                        ]);

                    $title = 'Email Verification Code';
                    $email = Session::get('email');
                    $data = ['title' => $title, 'email' => $email, 'otp' => $otp];
                    Mail::send('Email.emailverification', $data, function ($message) use ($data) {
                        $message->from(env('MAIL_USERNAME'))->subject($data['title']);
                        $message->to($data['email']);
                    });
                } catch (\Swift_TransportException $e) {
                    $response = $e->getMessage();
                    return [
                        'status' => 0,
                        'error' => [],
                        'message' => 'Sorry! We are facing some complexities with sending mail.',
                        'redirect_url' => null,
                    ];
                }

                // else verification code successfully sent
                return [
                    'status' => 0,
                    'error' => [],
                    'ev_mail' => $request->email,
                    'message' => 'Verification code has sent your email address. Please verify!',
                    'redirect_url' => 'mVerifyModal',
                ];
            }

            // checking if the account is not blocked
            if ($user_data->is_available != 1) {
                $this->incrementLoginAttempts($request);
                return redirect()->back()->with('error', "Sorry! Account is temporary blocked.");
            }

            // else everything is fine with this account


            // finally put session data and marking as logged in
            session([
                'id' => $user_data->id,
                'name' => $user_data->name,
                'email' => $user_data->email,
            ]);

            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ], true);

            $this->clearLoginAttempts($request);

            return [
                'status' => 1,
                'error' => [],
                'message' => 'Logged in successfully!',
                'redirect_url' => 1,
            ];
        }

        // if nothing works
        return [
            'status' => 0,
            'error' => [],
            'message' => 'Something went wrong!',
            'redirect_url' => null,
        ];
    }
}
