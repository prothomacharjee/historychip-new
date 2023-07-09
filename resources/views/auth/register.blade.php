@extends('site.layouts.header')

@section('content')
    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ml-auto mr-auto">
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
            <div class="offset-xxl-3 offset-xl-3  col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 m-auto">
                <div class="softsource-register_div">
                    <h3>Register</h3>
                    <h4>Where everyone's stories matter.</h4>

                    {{-- <br>
                    <div class="text-center">
                        <a href="{{ route('quick-register') }}" class="softsource-submit_btn btn-lg">Try Quick Registration</a>
                    </div> --}}

                    @if (session('success'))
                        <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-success">{{ session('success') }}</h6>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-danger"><i class='bx bxs-message-square-x'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-danger">{{ session('error') }}</h6>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('info'))
                        <div class="alert border-0 border-start border-5 border-info alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-info"><i class='bx bx-info-square'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-info">{{ session('info') }}</h6>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <br>

                    <form class="mt-3" method="POST" id="register_form" action="{{ route('register.submit') }}"
                        class="captcha-form">
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
                                <input id="city" type="text"
                                    class="form-control @error('city') is-invalid @enderror" name="city"
                                    value="{{ old('city') }}" placeholder="City *" autocomplete="city">
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
                            <textarea id="bio" class="form-control resize-none" name="bio" rows="5" maxlength="400"
                                placeholder="Tell readers a bit about yourself (Max 400 words)..."></textarea>
                        </div> <!-- / .form-group (bio) -->

                        <div class="form-group">

                            @if (count($partners) > 0)
                                <div class="checkbox">
                                    <input type="checkbox" id="toggle-partner"><label for="toggle-partner">Join with Our Community</label>
                                </div>
                                <select class="form-control select2" id="partner_id" name="partner_id"
                                    style="display:none">
                                    <option value="">Select an Partner</option>
                                    @foreach ($partners as $partner)
                                        <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                    @endforeach
                                </select>
                                <br />
                            @endif


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
                            <div class="d-flex justify-content-center">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>

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

    <script>
        $(document).on('click', '#toggle-partner', function() {
            $('#partner_id').slideToggle('slow', 'swing').prop('required', true);
        })
    </script>


@endsection
