@extends('site.layouts.header')

@section('content')
    <style scoped>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>
    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                    <div class="position-relative">
                        <div class="text-center softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text">{{ $page_title }}</h1>
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
                    <div class="my-5">

                        @if (session('success'))
                            <div
                                class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                                <div class="d-flex align-items-center">
                                    <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-success">{{ session('success') }}</h6>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div
                                class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
                                <div class="d-flex align-items-center">
                                    <div class="font-35 text-danger"><i class='bx bxs-message-square-x'></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-danger">{{ session('error') }}</h6>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
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
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('quick-register.verify.submit') }}" id="login-form"
                            class="captcha-form">
                            @csrf
                            <input type="hidden" name="id" value="{{ session('id') }}">
                            <div class="form-group">
                                <label for="otp" class="col-md-4 col-form-label">Enter OTP <span
                                        class="text-danger">*</span></label>
                                <input id="otp" type="number" class="form-control @error('otp') is-invalid @enderror"
                                    name="otp" value="" required autofocus placeholder="OTP *">
                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> <!-- / .form-group (email) -->

                            <input type="submit" value="Verify" id="login" class="softsource-submit_btn">

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
