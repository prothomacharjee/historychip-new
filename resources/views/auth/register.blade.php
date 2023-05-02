@extends('site.layouts.header')

@section('content')
    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                    <div class="position-relative">
                        <div class="text-center softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text">Register</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="softsource-register-section pt-5">
        <div class="container">
            <div class="offset-lg-3 col-sm-10 col-md-8 col-lg-6 col-12 m-auto">
                <div class="softsource-register_div">
                    <h3>Register</h3>
                    <h4>Where everyone's stories matter.</h4>
                    <form class="mt-3" method="POST" id="register_form" action="{{ route('register.submit') }}" class="captcha-form">
                        @csrf
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" required autofocus
                                placeholder="Name *">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> <!-- / .form-group (username)-->
                        <div class="form-group">
                            <input id="pen_name" type="text"
                                class="form-control @error('pen_name') is-invalid @enderror" name="pen_name"
                                value="{{ old('pen_name') }}" required autofocus autocomplete="pen_name"
                                placeholder="Pen Name - Your stories will appear under this name *">

                            @error('pen_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> <!-- / .form-group (userpen_name)-->

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required placeholder="Email *"
                                autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> <!-- / .form-group (email) -->

                        <div class="form-group">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                placeholder="Password *" autocomplete="new-password">
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon softsource-toggle-password"></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> <!-- / .form-group (password) -->

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required placeholder="Confirm password *" autocomplete="new-password">
                        </div> <!-- / .form-group (confirm password) -->

                        <div class="form-group row">
                            <div class="col">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" placeholder="City *" autocomplete="city">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!-- / city -->
                            <div class="col">
                                <input id="state" type="text"
                                    class="form-control @error('state') is-invalid @enderror" name="state"
                                    value="{{ old('state') }}" placeholder="State *" autocomplete="state">

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!-- / state -->
                            <div class="col">
                                <input id="country" type="text"
                                    class="form-control @error('country') is-invalid @enderror" name="country"
                                    value="{{ old('country') }}" placeholder="Country *" autocomplete="country">

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!-- / country -->
                        </div> <!-- / .form-group (city, state, country) -->

                        <div class="form-group">
                            <textarea id="bio" class="form-control" name="bio" rows="5" maxlength="400"
                                placeholder="Tell readers a bit about yourself... "></textarea>
                        </div> <!-- / .form-group (bio) -->

                        <div class="form-group">
                            <input type="checkbox" id="terms" name="terms" value="terms" required>
                            <label for="terms" class="softsource-register-terms-condition"> I agree to the
                                <a href="" data-bs-toggle="modal" data-bs-target="#softsource-pdfModal">Terms of
                                    Use</a></label><br />
                                <p style="color: red;"> @error('terms')
                                    {{ $message }}
                                @enderror
                            </p>
                            <input type="checkbox" id="sixteen" name="sixteen" value="sixteen" required><label
                                for="sixteen" class="softsource-register-terms-condition">I'm at least 16 years or older
                            </label><br />
                            <p style="color: red;"> @error('sixteen')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                <span class="captcha-validation" style="color:#b02a37" role="alert">

                                </span>
                                @error('g-recaptcha-response')
                                    <span style="color:#b02a37" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <br>
                        <input type="submit" value="Register" id="register" class="softsource-submit_btn"><br />
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
