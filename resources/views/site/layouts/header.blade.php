<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <!-- SEO -->
    <meta name="title" content="{{ $meta->meta_title??''}}">
    <meta name="description" content="{{ $meta->meta_description??''}}">
    <meta name="keywords" content="{{$meta->meta_keywords??''}}">


    <!-- Social Media -->
    <link rel="canonical" href="{{ URL::current() }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />

    <meta property="og:title" content="{{ $meta->page_title??''}} | {{ config('app.name', 'SoftSource') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ config('app.name', 'SoftSource') }}" />
    <meta property="og:image" content="{{ ($meta->og_image)? asset($meta->og_image):asset('frontend/images/logo/logo-light.png') }}" />
    <meta property="og:audio" content="{{ ($meta->og_audio)? asset($meta->og_audio):'' }}" />
    <meta property="og:video" content="{{ ($meta->og_video)? asset($meta->og_video):'' }}" />
    <meta property="og:description" content="{{ $meta->meta_description??'' }}" />
    <meta property="og:author" content="{{ $meta->og_author??'' }}" />
    <meta property="article:modified_time" content="{{ $meta->updated_at??'' }}" />

    <!-- Author Info -->
    <meta name="author" content="SoftSource, Bangladesh">
    <meta name="author" content="Prothom Acharjee (Developer)">
    <meta name="author" content="01818105488">

    <!-- Icon -->
    <link rel="icon" href="{{ asset('frontend/images/logo/favi.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $meta->page_title }} | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('frontend/css/fonts.css') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap/bootstrap.min.css?q=' . time()) }}">
    <link href="{{ asset('frontend/input-tags/css/tagsinput.css?q=' . time()) }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate/animate.min.css?q=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('frontend/fontawsome/css/all.min.css?q=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/select2/select2.min.css?q=' . time()) }}">

    <link href="{{ asset('frontend/file-uploader/css/font-fileuploader.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/file-uploader/css/jquery.fileuploader-theme-thumbnails.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/file-uploader/css/script.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/file-uploader/css/custom.css') }}">

    <link href="{{ asset('frontend/css/summernote/summernote-lite.min.css?q=' . time()) }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/css/frontend.css?q=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/mediaquery.css?q=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/keyframes.css?q=' . time()) }}">

    <script src="{{ asset('frontend/js/jquery/jquery.min.js?q=' . time()) }}"></script>
</head>

<body class="softsource-no-select">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-585M6TM" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="softsource-preloader-container">
        <div class="softsource-blinker">
            <img src="{{ asset('frontend/images/logo/logo.png') }}" class="mx-auto d-block" style="width: 150px;">
            <p class="softsource-cust-tag softsource-text-color-secondary">every person, every story, all the truth</p>
        </div>
    </div>

    <div class="softsource-main_content">
        <div class="navbar-expand-lg navbar-light softsource-nav-bg">
            <div class="softsource-top-section softsource-header-sticky">
                <div class="mx-3">
                    <div class="row align-items-center">
                        <div class="col-md-2 col-xxl-2 col-xl-2 col-lg-2 col-3 col-sm-2">
                            <div class="softsource-header-logo">
                                <a class="navbar-brand ms-auto " href="{{ route('home') }}">
                                    <img class="img-fluid light-logo" src="{{ asset('frontend/images/logo/logo-light.png') }}" alt="History Chip Logo">
                                    <p class="softsource-cust-tag">every person, every story, all the truth</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-8 col-xl-8 col-lg-8 col-4 col-sm-6">
                            <nav class="navbar">

                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-center " id="navbarNav">
                                    <ul class="navbar-nav softsource-nav-menus">
                                        <li class="nav-item softsource-has-children">
                                            <a class="nav-link softsource-nav-main-menu" href="javascript:;"><span>About</span><i class="fa-solid fa-angle-down softsource-nav-angle-down"></i></a>
                                            <ul class="softsource-submenu">
                                                <li><a href="{{ route('about') }}"><span>About History Chip</span></a>
                                                </li>
                                                <li><a href="{{ route('founder') }}"><span>Founder</span></a> </li>
                                                <li><a href="{{ route('historychipfor') }}"><span>Who is History Chip
                                                            for</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item softsource-has-children">
                                            <a class="nav-link softsource-nav-main-menu" href="javascript:;"><span>Stories</span><i class="fa-solid fa-angle-down softsource-nav-angle-down"></i></a>
                                            <ul class="softsource-submenu">
                                                <li><a href="{{ route('story.read') }}"><span>Read a
                                                            Story</span></a></li>
                                                <li><a href="{{ route('story.write') }}"><span>Write a
                                                            Story</span></a></li>

                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link softsource-nav-main-menu" href="{{ route('writingprompt') }}">
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
                                    <!-- <ul class="navbar-nav ms-auto">
                                        <li class="nav-item">
                                            <form method="GET" action="#" class="mt-1">

                                                <div class="input-group">
                                                    <input id="search" name="term" type="text"
                                                        class="form-control border-white bg-transparent text-white softsource-nav-search-input"
                                                        placeholder="Search Any Word" aria-label="Search Any Word"
                                                        aria-describedby="search-icon">
                                                    <button class="btn border-white softsource-nav-search-btn"
                                                        type="submit" id="search-icon"><i
                                                            class="fa fa-search text-white"></i></button>
                                                </div>
                                            </form>

                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-sm btn-light softsource-add-story-btn mt-1 softsource-btn-hover-transition"
                                                href="#">Add A Story</a>
                                        </li>
                                    </ul> -->
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-4 col-md-2 col-xxl-2 col-xl-2 col-lg-2 col-5	col-sm-4">
                            <div class="ml-2">
                                @guest
                                @if (Route::has('login'))
                                <a href="{{ route('register') }}" class="btn softsource-home-btn-register">Register</a>
                                <a href="{{ route('login') }}" class="btn softsource-home-btn-login">Login</a>
                                @endif
                                @else
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle text-white softsource-profile-dropdown-button" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ \App\Helpers\SoftSourceHelper::GetIntialsFromNameString(Auth::user()->name) }}
                                    </button>
                                    <ul class="dropdown-menu softsource-profile-dropdown-ulist" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="{{ route('profile') }}">My Profile&nbsp;&nbsp;</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('my-stories') }}">My
                                                Stories&nbsp;&nbsp;</a></li>
                                        <li class="divider"></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>

                                    {{-- <a href="#" class="btn text-white softsource-notification-icon" role="button" id="notification-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fa-stack fa-lg">
                                            <i class="fas fa-bell fa-stack-1x"></i>
                                            <span class="softsource-notification-count">3</span>
                                        </span>
                                    </a> --}}
                                    {{-- <ul class="dropdown-menu softsource-notification-dropdown" aria-labelledby="notification-dropdown">
                                        <li><a class="dropdown-item" href="#">Notification 1</a></li>
                                        <li><a class="dropdown-item" href="#">Notification 2</a></li>
                                        <li><a class="dropdown-item" href="#">Notification 3</a></li>
                                    </ul> --}}
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="softsource-bottom-section">
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

        <main class="">
            @yield('content')
            @include('site.layouts.footer')
        </main>
    </div>

    <!-- JS -->


    <script src="{{ asset('frontend/js/bootstrap/bootstrap.bundle.min.js?q=' . time()) }}"></script>
    <script src="{{ asset('frontend/input-tags/js/tagsinput.js?q=' . time()) }}"></script>
    <script src="{{ asset('frontend/js/select2/select2.min.js?q=' . time()) }}"></script>

    <script src="{{ asset('frontend/file-uploader/js/script.js?2.1.2') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/file-uploader/js/file-custom.js?2.1.2') }}" type="text/javascript"></script>

    <script src="{{ asset('frontend/js/summernote/summernote-lite.min.js?q=' . time()) }}"></script>

    <script src="{{ asset('frontend/fontawsome/js/17472dc9f4.js?q=' . time()) }}"></script>
    <script src="{{ asset('frontend/js/global-variables.js?q=' . time()) }}"></script>
    <script src="{{ asset('frontend/js/frontend.js?q=' . time()) }}"></script>
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
    </script>
    <!-- End Google Tag Manager -->


</body>

</html>
