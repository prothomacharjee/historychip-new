<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <!-- SEO -->
    <meta name="title" content="Revenue Aid, Consulting Firm, Revenue, SoftSource, RevenueAid, Prothom Acharjee">
    <meta name="description"
        content="Revenue Aid - A Unique Consulting Firm. Get Legal Help Provides and deals with all sorts of legal and professional services Keep Confidential Keep clients information confidential as for think fits and proper Avoid Unlawful Work Will not involved in unethical and unlawful work knowingly-Yeah, sure OUR MISSION OUR VISION OUR HISTORY To Our Country To contribute to the dream of Digital Bangladesh.">
    <meta name="keywords" content="Revenue Aid, Consulting Firm, Revenue, SoftSource, RevenueAid, Prothom Acharjee">


    <!-- Social Media -->
    <link rel="canonical" href="{{ URL::current() }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />

    <meta property="og:title" content="{{ $page_title }} | {{ config('app.name', 'SoftSource') }}" />
    {{-- <meta property="og:url" content="<?= base_url() ?>" />
	<meta property="og:site_name" content="Revenue Aid" />
	<meta property="og:image" content="<?php echo base_url() . 'assets/webassets/images/Asset 1.png'; ?>" />
	<meta property="og:description"
			content="Get Legal Help Provides and deals with all sorts of legal and professional services Keep Confidential Keep clients information confidential as for think fits and proper Avoid Unlawful Work Will not involved in unethical and unlawful work knowingly-Yeah, sure OUR MISSION OUR VISION OUR HISTORY To Our Country To contribute to the dream of Digital Bangladesh." />
	<meta property="article:modified_time" content="<?= date('d-M-Y H:i:s') ?>" /> --}}

    <!-- Author Info -->
    <meta name="author" content="SoftSource, Bangladesh">
    <meta name="author" content="Prothom Acharjee">
    <meta name="author" content="01818105488">

    <!-- Icon -->
    <link rel="icon" href="{{ asset('frontend/images/logo/favi.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title }} | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap/bootstrap.min.css?q=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate/animate.min.css?q=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('frontend/fontawsome/css/all.min.css?q=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/select2/select2.min.css?q=' . time()) }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/frontend.css?q=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/mediaquery.css?q=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/keyframes.css?q=' . time()) }}">

    <script src="{{ asset('frontend/js/jquery/jquery.min.js?q=' . time()) }}"></script>
</head>

<body>

    <div class="softsource-preloader-container">
        <div class="softsource-blinker">
            <img src="{{ asset('frontend/images/logo/logo.png') }}" class="mx-auto d-block" style="width: 150px;">
            <p class="softsource-cust-tag softsource-text-color-secondary">every person, every story, all the truth</p>
        </div>

    </div>


    <div class="softsource-main_content">
        <div class="navbar-expand-lg navbar-light softsource-nav-bg">
            <!-- Top Part -->
            <div class="container softsource-nav-top d-flex align-items-center justify-content-center text-white">
                <div class="softsource-top-nav-left px-1 d-flex">
                    @if ($notices)
                        <marquee onmouseover="this.stop();" onmouseout="this.start();">
                            @foreach ($notices as $notice)
                                &nbsp;&nbsp;&nbsp;&nbsp;{{ $notice->content }}&nbsp;&nbsp;&nbsp;&nbsp;
                            @endforeach
                        </marquee>
                    @endif


                </div>

                <div class="softsource-top-nav-right d-flex">
                    <div class="softsource-top-nav-login-link">
                        @guest
                            @if (Route::has('login'))
                                <a class="" href="{{ route('login') }}">Log In</a>/<a class=""
                                    href="{{ route('register') }}">Register</a>
                            @endif
                        @else
                            <div class="dropdown">
                                <button class="btn dropdown-toggle text-white softsource-profile-dropdown-button" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">My Profile&nbsp;&nbsp;</a></li>
                                    <li><a class="dropdown-item" href="{{ route('my-stories') }}">My Stories&nbsp;&nbsp;</a></li>
                                    <li class="divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
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
                    <div>&nbsp;|&nbsp;</div>
                    <div class="softsource-social-links">
                        <a href="https://www.facebook.com/HistoryChip/" target="_blank" aria-label="Facebook"
                            class="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://instagram.com/historychipofficial?igshid=7bbizkt10clm" target="_blank"
                            aria-label="Instagram" class=" ">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCSrIvdo034dV1rOL-adGu1g" target="_blank"
                            aria-label="You Tube" class=" ">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Bottom Part -->
            <div class="navbar-bottom softsource-header-sticky">

                <div class="d-flex align-items-center">
                    <div class="softsource-header-logo">
                        <a class="navbar-brand me-auto " href="{{ route('home') }}">
                            <img class="img-fluid light-logo"
                                src="{{ asset('frontend/images/logo/logo-light.png') }}" alt="History Chip Logo">
                            <p class="softsource-cust-tag">every person, every story, all the truth</p>
                        </a>
                    </div>
                    <div class="softsource-bottom-nav-right">
                        <div class="container">
                            <nav class="navbar">

                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
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
                                                <li><a href="https://www.historychip.com/readastory"><span>Read a
                                                            Story</span></a></li>
                                                <li><a href="https://www.historychip.com/submitastory"><span>Write a
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
                                                <li><a href="{{ route('register') }}"><span>Registration</span></a>
                                                </li>
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
                                            <a class="nav-link softsource-nav-main-menu" href="#">
                                                <span>Partners</span>
                                            </a>
                                        </li>
                                        {{-- <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#"
                                                id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Products
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Product 1</a></li>
                                                <li><a class="dropdown-item" href="#">Product 2</a></li>
                                                <li><a class="dropdown-item" href="#">Product 3</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                    <ul class="navbar-nav ms-auto">
                                        <li class="nav-item">
                                            <form method="GET" action="/search/basic" class="mt-1">
                                                @csrf
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
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="">
            @yield('content')
        </main>
        @include('site.layouts.footer')
    </div>

    <!-- JS -->

    <script src="{{ asset('frontend/js/bootstrap/bootstrap.min.js?q=' . time()) }}"></script>
    <script src="{{ asset('frontend/js/popper/popper.min.js?q=' . time()) }}"></script>
    <script src="{{ asset('frontend/js/popper/popper.js.map?q=' . time()) }}"></script>
    <script src="{{ asset('frontend/js/select2/select2.min.js?q=' . time()) }}"></script>

    <script src="{{ asset('frontend/fontawsome/js/17472dc9f4.js?q=' . time()) }}"></script>
    <script src="{{ asset('frontend/js/global-variables.js?q=' . time()) }}"></script>
    <script src="{{ asset('frontend/js/script.js?q=' . time()) }}"></script>


</body>

</html>
