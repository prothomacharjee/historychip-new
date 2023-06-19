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
        <form method="POST" id="softsource-personal_info_form" action="route('profile.save')" class="w-100" enctype="multipart/form-data"
            novalidate="novalidate">
            <div class="row">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="col-md-4 mb-4 text-center">
                    <label class="softsource-custom-profile d-block m-auto">
                        <img src="{{ asset('frontend/images/web_img/user4.jpg') }}" alt="profile image"
                            class="img-fluid profile-picture" id="profile-img-tag">
                        <input type="hidden" name="user_profile[image]" value="">
                        <input type="file" name="image_name" class="softsource-profile-pic"
                            accept="image/png, image/jpeg,image/jpg">
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
                        <div class="softsource-profile-user-icon d-sm-block d-none"> <i class="fa fa-user"
                                aria-hidden="true"></i> </div>
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
                                        <input type="text" value="{{ $user->name }}" class="form-control" name="name"
                                            placeholder="Name">
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
                                        <input type="text" value="{{ $user->user_profile->pen_name }}" class="form-control" name="user_profile[pen_name]"
                                            placeholder="Pen Name">
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
                                        <textarea class="form-control" name="user_profile[bio]" placeholder="Brief Bio">{{ $user->user_profile->bio }}</textarea>
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
                                        <input type="link" value="{{ $user->user_profile->facebook_page_link }}" class="form-control" name="user_profile[facebook_page_link]"
                                            placeholder="Facebook">
                                    </div>
                                    <div class="form-group profile-icon mb-1">
                                        <input type="link" value="{{ $user->user_profile->twitter_page_link }}" class="form-control" name="user_profile[twitter_page_link]"
                                            placeholder="Twitter">
                                    </div>
                                    <div class="form-group profile-icon mb-1">
                                        <input type="link" value="{{ $user->user_profile->linkedin_page_link }}" class="form-control" name="user_profile[linkedin_page_link]"
                                            placeholder="LinkedIn">
                                    </div>
                                    <div class="form-group profile-icon mb-0">
                                        <input type="link" value="{{ $user->user_profile->instagram_page_link }}" class="form-control" name="user_profile[instagram_page_link]"
                                            placeholder="Instagram">
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
                                        <input type="email" value="{{ $user->email }}" class="form-control"
                                            name="email" placeholder="Email" disabled="">
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
                                        <input type="tel" value="{{ $user->user_profile->phone }}" class="form-control" name="user_profile[phone]"
                                            placeholder="Phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="row softsource-border-bottom">
                                <div class="col-md-6">
                                    <h4 class="profile-desc-left">
                                        City *
                                    </h4>
                                    (Not Public)
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group profile-icon mb-0">
                                        <input type="text" value="{{ $user->user_profile->city }}" class="form-control" name="user_profile[city]"
                                            placeholder="City">
                                    </div>
                                </div>
                            </div>
                            <div class="row softsource-border-bottom">
                                <div class="col-md-6">
                                    <h4 class="profile-desc-left">
                                        State *
                                    </h4>
                                    (Not Public)
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group profile-icon mb-0">
                                        <input type="text" value="{{ $user->user_profile->state }}" class="form-control" name="user_profile[state]"
                                            placeholder="State">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="profile-desc-left">
                                        Country *
                                    </h4>
                                    (Not Public)
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group profile-icon mb-0">
                                        <input type="text" value="{{ $user->user_profile->country }}" class="form-control" name="user_profile[country]"
                                            placeholder="Country">
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
                                        <input type="date" value="{{ $user->user_profile->dob }}" class="form-control" name="user_profile[dob]"
                                            placeholder="DOB">
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
        <form id="desc-permission_info_form" method="post" novalidate="novalidate">
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
                                            <input type="checkbox" name="is_pic_public" value="0"
                                                class="softsource-onoffswitch-checkbox" id="piconoffswitch" tabindex="0"
                                                checked="">
                                            <label class="softsource-switch">
                                                <input type="checkbox" id="checkbox">
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
                                            <input type="checkbox" name="is_social_media_public" value="0"
                                                class="softsource-onoffswitch-checkbox" id="bioonoffswitch" tabindex="0"
                                                checked="">
                                            <label class="softsource-switch">
                                                <input type="checkbox" id="checkbox">
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
                                            <input type="checkbox" name="is_bio_public" value="0"
                                                class="softsource-onoffswitch-checkbox" id="socialonoffswitch" tabindex="0"
                                                checked="">
                                            <label class="softsource-switch">
                                                <input type="checkbox" id="checkbox">
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

@endsection
