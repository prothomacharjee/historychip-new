@extends('site.layouts.header')

@section('content')
    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                    <div class="position-relative">
                        <div class="text-center softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text">Login</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="softsource-login-section pt-5">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-sm-10 col-md-8 col-lg-6 col-12 m-auto">
                    <div class="softsource-login_div">
                        <h3>Login</h3>
                        <h4>Great to have you back!</h4>
                        <br>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autofocus placeholder="Email *">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> <!-- / .form-group (email) -->
                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    placeholder="Password *">
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon softsource-toggle-password"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> <!-- / .form-group (password) -->
                            <br>
                            <input type="submit" value="login" id="login" class="softsource-submit_btn"><br /><br />
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="checkbox" id="remember" name="remember" value="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember" class="softsource-login-remember-label"> Remember me</label>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="{{ route('password.request') }}">Forgot Your Password ?</a>
                                </div>
                                <div class="col-md-12 text-center mt-5">
                                    <span class="softsource-login-remember-not-registered"> Don’t have an account? <a href="{{ route('register') }}"
                                        class="text-decoration-underline softsource-font-weight--bold">Register</a></span>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
