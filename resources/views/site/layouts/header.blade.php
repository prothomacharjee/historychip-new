<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <!-- SEO -->
    <meta name="title" content="{{ $meta->meta_title ?? '' }}">
    <meta name="description" content="{{ $meta->meta_description ?? '' }}">
    <meta name="keywords" content="{{ $meta->meta_keywords ?? '' }}">


    <!-- Social Media -->
    <link rel="canonical" href="{{ URL::current() }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />

    <meta property="og:title" content="{{ $meta->page_title ?? '' }} | {{ config('app.name', 'SoftSource') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ config('app.name', 'SoftSource') }}" />
    <meta property="og:image"
        content="{{ !empty($meta) && $meta->og_image ? asset($meta->og_image) : asset('frontend/images/logo/logo-light.png') }}" />
    <meta property="og:audio" content="{{ !empty($meta) && $meta->og_audio ? asset($meta->og_audio) : '' }}" />
    <meta property="og:video" content="{{ !empty($meta) && $meta->og_video ? asset($meta->og_video) : '' }}" />
    <meta property="og:description" content="{{ $meta->meta_description ?? '' }}" />
    <meta property="og:author" content="{{ $meta->og_author ?? '' }}" />
    <meta property="article:modified_time" content="{{ $meta->updated_at ?? '' }}" />

    <!-- Author Info -->
    <meta name="author" content="SoftSource, Bangladesh">
    <meta name="author" content="Prothom Acharjee (Developer)">
    <meta name="author" content="01818105488">

    <!-- Icon -->
    <link rel="icon" href="{{ asset('frontend/images/logo/favi.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $meta->page_title ?? '' }} | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('frontend/css/fonts.css') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap/bootstrap.min.css') }}">
    <link href="{{ asset('frontend/input-tags/css/tagsinput.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fontawsome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/select2/select2.min.css') }}">

    <link href="{{ asset('frontend/file-uploader/css/font-fileuploader.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/file-uploader/css/jquery.fileuploader-theme-thumbnails.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/file-uploader/css/script.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/file-uploader/css/custom.css') }}">

    <link href="{{ asset('frontend/css/summernote/summernote-lite.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/css/frontend.css?q=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/mediaquery.css?q=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/keyframes.css?q=' . time()) }}">

    <script src="{{ asset('frontend/js/jquery/jquery.min.js') }}"></script>
    <script>
        /*to prevent Firefox FOUC, this must be here*/
        let FF_FOUC_FIX;
    </script>

    @php

        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    @endphp
</head>

<body class="softsource-no-select">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-585M6TM" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="softsource-preloader-container">
        <div class="softsource-blinker">
            <img src="{{ asset('frontend/images/logo/logo.png') }}" class="mx-auto d-block" style="width: 150px;">
            <p class="softsource-cust-tag softsource-text-color-secondary">every person, every story, all the truth</p>
        </div>
    </div>

    <div class="softsource-main_content">
        <div class="navbar-expand-lg navbar-light">

            <div class="row softsource-header-sticky me-0">
                <div class="col-xxl-2 col-xl-1 col-lg-1 col-md-2 col-2 col-sm-2">
                    <div class="softsource-header-logo">
                        <a class="navbar-brand ms-auto " href="{{ route('home') }}">
                            <img class="img-fluid light-logo" src="{{ asset('frontend/images/logo/logo.png') }}"
                                alt="History Chip Logo">
                            <p class="softsource-cust-tag">every person, every story, all the truth</p>
                        </a>
                    </div>
                </div>

                <div class="col-xxl-10 col-xl-11 col-lg-11 col-md-10 col-10 col-sm-10">
                    <div class="softsource-mid-nav-top-section d-flex justify-content-evenly align-items-center mt-3">
                        <nav class="navbar">

                            <div class="collapse navbar-collapse justify-content-center " id="navbarNav">
                                <ul class="navbar-nav softsource-nav-menus">
                                    <li class="nav-item softsource-has-children">
                                        <a class="nav-link softsource-nav-main-menu"
                                            href="javascript:;"><span>About</span><i
                                                class="fa-solid fa-angle-down softsource-nav-angle-down"></i></a>
                                        <ul class="softsource-submenu">
                                            <li><a href="{{ route('about') }}"><span>About History Chip</span></a>
                                            </li>
                                            <li><a href="{{ route('founder') }}"><span>Founder</span></a> </li>
                                            <li><a href="{{ route('historychipfor') }}"><span>Who is History Chip
                                                        for</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item softsource-has-children">
                                        <a class="nav-link softsource-nav-main-menu"
                                            href="javascript:;"><span>Stories</span><i
                                                class="fa-solid fa-angle-down softsource-nav-angle-down"></i></a>
                                        <ul class="softsource-submenu">
                                            <li><a href="{{ route('story.read') }}"><span>Read a
                                                        Story</span></a></li>
                                            <li><a href="{{ route('story.write') }}"><span>Write a
                                                        Story</span></a></li>

                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link softsource-nav-main-menu"
                                            href="{{ route('writingprompt') }}">
                                            <span>Writing Prompts</span>
                                        </a>
                                    </li>
                                    <li class="nav-item softsource-has-children">
                                        <a class="nav-link softsource-nav-main-menu" href="javascript:;">
                                            <span>Resource</span>
                                            <i class="fa-solid fa-angle-down softsource-nav-angle-down"></i>
                                        </a>
                                        <ul class="softsource-submenu">
                                            <li><a href="{{ route('faq') }}"><span>FAQ</span></a></li>
                                            @guest
                                                <li><a href="{{ route('register') }}"><span>Registration</span></a>
                                                </li>
                                            @endguest
                                            <li><a href="{{ route('privacypolicy') }}"><span>Privacy
                                                        Policy</span></a></li>
                                            <li><a href="{{ route('termsandconditions') }}"><span>Term
                                                        of Use</span></a></li>
                                            <li><a href="{{ route('contactus') }}"><span>Contact
                                                        Us</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link softsource-nav-main-menu" href="{{ route('blogs') }}">
                                            <span>Blogs</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link softsource-nav-main-menu" href="{{ route('partners') }}">
                                            <span>Partners</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <form method="POST" action="{{ route('story.search') }}"
                            class="softsource-top-search-form">
                            @csrf
                            <div class="input-group softsource-nav-search-bar">

                                <input type="text" class="form-control softsource-nav-search-input"
                                    placeholder="Search Any Word" name="search"
                                    value="{{ old('search') ? old('search') : null }}">
                                <div class="input-group-prepend softsource-nav-search-btn">
                                    <button type="submit" class="input-group-text"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('story.write') }}" class="btn softsource-nav-add-story-btn">Add a story</a>
                        <div class="softsource-top-login-register-div">
                            @guest
                                @if (Route::has('login'))
                                    <span class="softsource-nav-login-register"><a href="{{ route('login') }}"
                                            class="">Login</a> / <a href="{{ route('register') }}"
                                            class="">Register</a></span>
                                @endif
                            @else
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle softsource-profile-dropdown-button" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ \App\Helpers\SoftSourceHelper::GetIntialsFromNameString(Auth::user()->name) }}
                                    </button>
                                    <ul class="dropdown-menu softsource-profile-dropdown-ulist"
                                        aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="{{ route('profile') }}">My
                                                Profile&nbsp;&nbsp;</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('my-stories') }}">My
                                                Stories&nbsp;&nbsp;</a></li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endguest
                        </div>

                        <div class="softsource-responsive-menu-div ms-auto d-none">
                            <div class="softsource-nav-toggle-btn" style="display: none">
                                <div id='top'></div>
                                <div id='middle'></div>
                                <div id='bottom'></div>
                            </div>
                            <div class="softsource-responsive-nav">
                                <div id="items">

                                    <nav class="softsource-responsive-navigation-menu">
                                        <ul class="softsource-responsive-nav-menus">
                                            <li class="">
                                                <a href="/"><span>Home</span></a>

                                            </li>
                                            <li class="softsource-responsive-has-children">
                                                <a href="javascript:;">
                                                    <span>About us</span>
                                                    <i class="fa-solid fa-angle-down softsource-nav-angle-down"></i>
                                                </a>
                                                <ul class="softsource-submenu hidden">
                                                    <li>
                                                        <a href="{{ route('about') }}">
                                                            <span>About Us</span>

                                                        </a>
                                                    </li>
                                                    <li><a href="{{ route('founder') }}"><span>Founder</span></a>
                                                    </li>
                                                    <li><a href="{{ route('historychipfor') }}"><span>Who is
                                                                History Chip
                                                                for</span></a></li>
                                                    <!-- <li><a href="javascript:;"><span>Terms of Use</span></a></li> -->
                                                </ul>
                                            </li>
                                            <li class="softsource-responsive-has-children">
                                                <a href="javascript:;"><span>Stories</span>
                                                    <i class="fa-solid fa-angle-down softsource-nav-angle-down"></i>
                                                </a>
                                                <ul class="softsource-submenu hidden">
                                                    <li><a href="{{ route('story.read') }}"><span>Read a
                                                                Story</span></a></li>
                                                    <li><a href="{{ route('story.write') }}"><span>Write a
                                                                Story</span></a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{ route('writingprompt') }}"><span>Writing
                                                        Prompts</span></a>
                                            </li>
                                            <li class="softsource-responsive-has-children">
                                                <a href="javascript:;">
                                                    <span>Resource</span>
                                                    <i class="fa-solid fa-angle-down softsource-nav-angle-down"></i>
                                                </a>
                                                <!-- multilevel submenu -->
                                                <ul class="softsource-submenu hidden">
                                                    <li>
                                                        <a href="{{ route('faq') }}">
                                                            <span>FAQ</span>
                                                        </a>
                                                    </li>

                                                    @guest
                                                        <li>
                                                            <a
                                                                href="{{ route('register') }}"><span>Registration</span></a>
                                                        </li>
                                                    @endguest
                                                    <li>
                                                        <a href="{{ route('privacypolicy') }}">
                                                            <span>Privacy Policy</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('termsandconditions') }}">
                                                            <span>Term of Use</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('contactus') }}">
                                                            <span>Contact Us</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{ route('blogs') }}"><span>Blogs</span></a>
                                            </li>

                                            <li>
                                                <a href="{{ route('partners') }}"><span>Partners</span></a>
                                            </li>

                                            @guest
                                                @if (Route::has('login'))
                                                    <li>
                                                        <a href="{{ route('login') }}"
                                                            class=""><span>Login</span></a>
                                                    </li>
                                                @endif
                                                @if (Route::has('register'))
                                                    <li>
                                                        <a href="{{ route('register') }}"
                                                            class=""><span>Register</span></a>
                                                    </li>
                                                @endif
                                            @else
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('profile') }}">My
                                                        Profile&nbsp;&nbsp;</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('my-stories') }}">My
                                                        Stories&nbsp;&nbsp;</a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            @endguest
                                        </ul>
                                    </nav>

                                    <div class="text-center mt-3">
                                        <a href="{{ route('story.write') }}"
                                            class="btn softsource-home-fetured-story-read-more-story-btn px-5">Add a
                                            Story</a>


                                    </div>

                                    <form method="POST" action="{{ route('story.search') }}"
                                        class="softsource-responsive-search-form px-3 mt-2">
                                        @csrf
                                        <div class="input-group softsource-nav-search-bar">

                                            <input type="text" class="form-control softsource-nav-search-input"
                                                placeholder="Search Any Word" name="search"
                                                value="{{ old('search') ? old('search') : null }}">
                                            <div class="input-group-prepend softsource-nav-search-btn">
                                                <button class="input-group-text"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>




                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="softsource-mid-nav-bottom-section">
                        <div class="softsource-scrolling-notice">
                            <marquee behavior="scroll" direction="left">
                                <ul class="softsource-scrolling-notice-lists-container">
                                    @foreach ($notices as $notice)
                                        <li>{{ $notice->content }}</li>
                                    @endforeach
                                </ul>
                            </marquee>
                        </div>
                    </div>


                </div>



            </div>
        </div>

        <main class="">
            @yield('content')
            @include('site.layouts.footer')
        </main>
    </div>

    <!-- JS -->


    <script src="{{ asset('frontend/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/input-tags/js/tagsinput.js') }}"></script>
    <script src="{{ asset('frontend/js/select2/select2.min.js') }}"></script>

    <script src="{{ asset('frontend/file-uploader/js/script.js?2.1.2') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/file-uploader/js/file-custom.js?2.1.2') }}" type="text/javascript"></script>

    <script src="{{ asset('frontend/js/summernote/summernote-lite.min.js') }}"></script>

    <script src="{{ asset('frontend/fontawsome/js/17472dc9f4.js?q=' . time()) }}"></script>
    <script src="{{ asset('frontend/js/global-variables.js') }}"></script>
    <script src="{{ asset('frontend/js/frontend.js') }}"></script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-585M6TM');

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
    <!-- End Google Tag Manager -->


</body>

</html>
