<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    // overriding the Trait
    protected $maxAttempts = 3;
    protected $decayMinutes = 5;

    // Login
    public function showLoginForm()
    {

        return view('backend.admin-auth.login')->with([
            'page_title' => 'Login',
            // 'notices' => $this->notices,
            // 'meta' => $this->pages,
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
            // 'g-recaptcha-response' => 'required', //|captcha'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        } else {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('admin')->attempt($credentials, $request->get('remember'))) {
                // User is authenticated
                $this->clearLoginAttempts($request);
                return redirect()->route('admin.dashboard');
            } else {
                // Check if email is registered
                $user = Admin::where('email', $credentials['email'])->first();
                if (!$user) {
                    // Notify user that email is not registered
                    $this->incrementLoginAttempts($request);

                    return redirect()->back()->with('error', "This Email is not registered in our system.");
                } else {
                    // Check if email is verified
                    if ($user->is_available == 0) {
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

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        // Perform any additional actions after the user has been logged out, if needed.
        return redirect()->route('admin.login'); // Replace 'login' with the appropriate route name for your login page
    }

}
