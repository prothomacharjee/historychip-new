@extends('site.layouts.header')

@section('content')
    <style scoped>
        .softsource-top-contianer {
            background-image: url("{{ asset('frontend/images/web_img/contactbg.jpg') }}");
            background-position: center;
            background-size: cover;
        }
    </style>
    <!--============ Resolutions Hero Start ============-->
    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ms-auto me-auto">
                    <div class="position-relative">
                        <div class="text-center softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text">Contact Us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============ about Start ============-->
    <div class="softsource-contact-us-section pt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-lg-6">
                    <div class="softsource-contact-us-left mb-3">
                        <h3>Questions, comments,<br>concerns?</h3>
                        <h3 class="heading">
                            <span class="text-color-primary"></span>
                            <ul class="softsource-conact-info__list">
                                <li><i class="fa fa-location-arrow" aria-hidden="true"></i> History Chip, LLC</li>
                                <li> P.O. Box 516</li>
                                <li>Watertown, CT 06795-9988</li>
                                <li><a href="mailto:info@historychip.com"
                                        class="position-relative text-color-primary">info@historychip.com</a></li>
                            </ul>
                        </h3>

                    </div>
                </div>
                <?php $url = Session::get('org_hash') != null ? url('/') . '/' . Session::get('org_hash') : url('/'); ?>
                <div class="col-lg-6 col-lg-6">
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

                    <div class="softsource-contact-us-right">
                        <form method="POST" action="{{ route('contactus.submit') }}">
                            @csrf
                            <div class="softsource-contact-form">
                                <div class="softsource-contact-input">
                                    <div class="softsource-contact-inner">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') ? old('name') : (Auth::check() ? Auth::guard('web')->user()->name : '') }}"
                                            required placeholder="Name *">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="softsource-contact-inner">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') ? old('email') : (Auth::check() ? Auth::guard('web')->user()->email : '') }}"
                                            required placeholder="Email *">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="softsource-contact-inner">
                                    <input id="phone" type="phone" class="form-control" name="phone"
                                        placeholder="Phone">
                                </div>
                                <div class="softsource-contact-inner">
                                    <textarea id="comment" name="comment" placeholder="Please describe what you need. *" required>{{ old('comment') ? old('comment'):'' }}</textarea>
                                </div>

                                <div class="form-group">
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
                                <div class="mt-5">
                                    <button class="ht-btn ht-btn-md softsource-submit_btn" type="submit">Send
                                        message</button>
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
