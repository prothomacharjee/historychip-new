@extends('site.layouts.header')

@section('content')
<!--============ Resolutions Hero Start ============-->
<div class="position-relative softsource-top-contianer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 ms-auto me-auto">
                <div class="position-relative">
                    <div class="text-center softsource-font ">
                        <h1 class="text-white softsoutce-top-banner-text">{{ $page_title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5" id="softsource-profile-container">
    <div class="row">
        <div class="col-12">
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
        </div>
    </div>
    <form method="POST" id="softsource-personal_info_form" action="{{ route('profile.about.save') }}" novalidate class="needs-validation w-100" enctype="multipart/form-data">
        <div class="row">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">

            <div class="col-md-4 mb-4 text-center">
                <label class="softsource-custom-profile d-block m-auto">
                    @php
                    if (is_null($user->user_profile->image) or $user->user_profile->image == "") {
                    $image = asset("frontend/images/web_img/user4.jpg");
                    } else {
                    $image = asset($user->user_profile->image);
                    }
                    @endphp

                    <img src="{{ $image }}" alt="profile image" class="img-fluid profile-picture" id="profile-img-tag">
                    <!-- <input type="hidden" name="image" value="{{$user->user_profile->image}}"> -->
                    <input type="file" name="image_name" class="softsource-profile-pic" accept=".png,.jpg,.jpeg,.svg, .webp" maxFileSize="2MB" onchange="FileUploaderValidation(this, 2, ['image/png', 'image/jpeg', 'image/svg', 'image/webp'], 'profile')" />
                    <div id="file-error-profile" class="form-text text-danger"></div>>
                    <div class="softsource-bg-overlay">
                        <div class="softsource-bg-overlay-content">
                            <p><i class="fa fa-upload"></i> </p>
                        </div>
                        <div class="softsource-bg-overlay-bg"></div>
                    </div>
                </label>
                <div class="profilename text-center pp">
                    <h4>{{ $user->name }}</h4>
                </div>
                <p class="profile-user-designation">{{ $user->user_profile->pen_name }}</p>
                {{-- <a class="btn btn-success profile-prev" type="button" data-toggle="modal" data-target="#profilePrev"
                        data-id="3557">Profile Preview</a> --}}
            </div>
            <div class="col-md-8 softsource-profile-details">

                <div class="softsource-profile-media mb-5">
                    <div class="softsource-profile-user-icon d-sm-block d-none"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                    <div class="softsource-media-body overflow-hidden">
                        <h5 class="softsource-profile-desc-head">ABOUT ME</h5>

                        <div class="row softsource-border-bottom">
                            <div class="col-md-6">
                                <h4 class="profile-desc-left">
                                    Full Name *
                                </h4>
                                (Not Public)
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile-icon mb-0">
                                    <input readonly required type="text" value="{{ $user->name }}" class="form-control" name="name" placeholder="Name">
                                </div>
                            </div>
                        </div>

                        <div class="row softsource-border-bottom">
                            <div class="col-md-6">
                                <h4 class="profile-desc-left">
                                    Pen Name *
                                </h4>
                                (Public)
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile-icon mb-0">
                                    <input required type="text" value="{{ $user->user_profile->pen_name }}" class="form-control" name="pen_name" placeholder="Pen Name">
                                </div>
                            </div>
                        </div>
                        <div class="row softsource-border-bottom">
                            <div class="col-md-6">
                                <h4 class="profile-desc-left">
                                    Brief bio
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile-icon mb-0">
                                    <textarea class="form-control" name="bio" placeholder="Brief Bio">{{ $user->user_profile->bio }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row softsource-border-bottom">
                            <div class="col-md-6">
                                <h4 class="profile-desc-left">
                                    Social media platforms
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile-icon mb-2">
                                    <input type="link" value="{{ $user->user_profile->facebook_page_link }}" class="form-control" name="facebook_page_link" placeholder="Facebook">
                                </div>
                                <div class="form-group profile-icon mb-1">
                                    <input type="link" value="{{ $user->user_profile->twitter_page_link }}" class="form-control" name="twitter_page_link" placeholder="Twitter">
                                </div>
                                <div class="form-group profile-icon mb-1">
                                    <input type="link" value="{{ $user->user_profile->linkedin_page_link }}" class="form-control" name="linkedin_page_link" placeholder="LinkedIn">
                                </div>
                                <div class="form-group profile-icon mb-0">
                                    <input type="link" value="{{ $user->user_profile->instagram_page_link }}" class="form-control" name="instagram_page_link" placeholder="Instagram">
                                </div>
                            </div>
                        </div>

                        <div class="row softsource-border-bottom">
                            <div class="col-md-6">
                                <h4 class="profile-desc-left">
                                    Email *
                                </h4>
                                (Not Public)
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile-icon mb-0">
                                    <input required readonly type="email" value="{{ $user->email }}" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row softsource-border-bottom">
                            <div class="col-md-6">
                                <h4 class="profile-desc-left">
                                    Phone number
                                </h4>
                                (Not Public)
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile-icon mb-0">
                                    <input type="tel" value="{{ $user->user_profile->phone }}" class="form-control" name="phone" placeholder="Phone number">
                                </div>
                            </div>
                        </div>
                        <div class="row softsource-border-bottom">
                            <div class="col-md-6">
                                <h4 class="profile-desc-left">
                                    City
                                </h4>
                                (Not Public)
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile-icon mb-0">
                                    <input type="text" value="{{ $user->user_profile->city }}" class="form-control" name="city" placeholder="City">
                                </div>
                            </div>
                        </div>
                        <div class="row softsource-border-bottom">
                            <div class="col-md-6">
                                <h4 class="profile-desc-left">
                                    State
                                </h4>
                                (Not Public)
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile-icon mb-0">
                                    <input type="text" value="{{ $user->user_profile->state }}" class="form-control" name="state" placeholder="State">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="profile-desc-left">
                                    Country
                                </h4>
                                (Not Public)
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile-icon mb-0">
                                    <input type="text" value="{{ $user->user_profile->country }}" class="form-control" name="country" placeholder="Country">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="profile-desc-left">
                                    Birth date
                                </h4>
                                (Not Public)
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile-icon mb-0">
                                    <input type="date" value="{{ $user->user_profile->dob }}" class="form-control" name="dob" placeholder="DOB">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-block text-end">
                            <button type="submit" class="d-inline softsource-profile-update-btn">UPDATE</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <form id="desc-permission_info_form" method="post" novalidate class="needs-validation" action="{{ route('profile.visibility.save') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <div class="softsource-profile-details">
                    <div class="softsource-profile-media mb-5">
                        <div class="icon d-sm-block d-none"> <i class="fa fa-key" aria-hidden="true"></i> </div>
                        <div class="softsource-media-body">
                            <h5 class="softsource-profile-desc-head">Profile Visibility</h5>
                            <div class="row softsource-border-bottom">
                                <div class="col-md-6">
                                    <h4 class="softsource-profile-desc-left">
                                        Profile Photo
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="softsource-onoffswitch">
                                        <input type="checkbox" name="is_pic_public" value="{{ $user->user_profile->is_pic_public }}" class="softsource-onoffswitch-checkbox" id="piconoffswitch" tabindex="0" checked="">
                                        <label class="softsource-switch">
                                            <input type="checkbox" id="checkbox" value="{{ $user->user_profile->is_pic_public }}" {{ $user->user_profile->is_pic_public == 1 ? 'checked' : '' }}>
                                            <span class="softsource-slider-toggle"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="softsource-profile-desc-left">
                                        Social media platforms
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="softsource-onoffswitch">
                                        <input type="checkbox" name="is_social_media_public" value="{{ $user->user_profile->is_social_media_public }}" class="softsource-onoffswitch-checkbox" id="bioonoffswitch" tabindex="0" checked="">
                                        <label class="softsource-switch">
                                            <input type="checkbox" id="checkbox" value="{{ $user->user_profile->is_social_media_public }}" {{ $user->user_profile->is_social_media_public == 1 ? 'checked' : '' }}>
                                            <span class="softsource-slider-toggle"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="softsource-profile-desc-left">
                                        Brief bio
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="softsource-onoffswitch">
                                        <input type="checkbox" name="is_bio_public" value="{{ $user->user_profile->is_bio_public }}" class="softsource-onoffswitch-checkbox" id="socialonoffswitch" tabindex="0" checked="">
                                        <label class="softsource-switch">
                                            <input type="checkbox" id="checkbox" value="{{ $user->user_profile->is_bio_public }}" {{ $user->user_profile->is_bio_public == 1 ? 'checked' : '' }}>
                                            <span class="softsource-slider-toggle"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-block text-end">
                                <button type="submit" class="btn btn-primary d-inline softsource-profile-update-btn">UPDATE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).on("change", '.softsource-switch #checkbox', function() {
        //        $(this).closest("div.onoffswitch").find("input").prop("checked");
        if ($(this).is(":checked")) {
            $(this).val(1);
            $(this).closest("div.softsource-onoffswitch").find("input").val(1)
        } else {
            $(this).val(0);
            $(this).closest("div.softsource-onoffswitch").find("input").val("0")
        }
    })
</script>

@endsection
