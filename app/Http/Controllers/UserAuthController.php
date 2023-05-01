<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
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
            return [
                'status' => 0,
                'error' => [],
                'message' => 'Too many login attempts. Please try again after ' . $seconds . ' seconds.',
                'redirect_url' => null,
            ];
        }

        // validation checking
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:18',
        ]);

        $error_array = array();

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
            if ($user_data->email_verified_at != 1) {
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
                return [
                    'status' => 0,
                    'error' => [],
                    'message' => 'Sorry! Account is temporary blocked.',
                    'redirect_url' => null,
                ];
            }

            // else everything is fine with this account

            // Checking if user has any restaurants items in cart
            $cart = Cart::where([
                ['user_id', $user_data->id],
                ['is_deleted', 0],
            ])
                ->count();

            // if not checking shopping cart
            if ($cart == 0) {
                $cart = ShoppingCart::where([
                    ['user_id', $user_data->id],
                    ['is_deleted', 0],
                ])
                    ->count();
            }

            // finally put session data and marking as logged in
            session([
                'id' => $user_data->id,
                'name' => $user_data->name,
                'email' => $user_data->email,
                'cart' => $cart,
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
