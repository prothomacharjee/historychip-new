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
                        <h3 class="heading"><span class="text-color-primary"></span>
                            <ul class="softsource-unorder-list softsource-conact-info__list">
                                <li><i class="fal fa-location-arrow" aria-hidden="true"></i> History Chip, LLC</li>
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
                    <div class="softsource-contact-us-right">
                        <form method="POST" action="">
                            @csrf
                            <div class="softsource-contact-form">
                                <div class="softsource-contact-input">
                                    <div class="softsource-contact-inner">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required placeholder="Name *">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="softsource-contact-inner">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required placeholder="Email *">
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
                                    <textarea id="comment" name="comment" placeholder="Please describe what you need. *" required></textarea>
                                </div>
                                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    <div class="g-recaptcha" data-sitekey="6Ldbtq4ZAAAAAD4ydSIZZZufmPz-qK6P9LdDtPpJ"></div>
                                    <p style="color: red;"> @error('g-recaptcha-response')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                                <div class="mt-5">
                                    <button class="ht-btn ht-btn-md softsource-submit_btn" type="submit">Send message</button>
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
