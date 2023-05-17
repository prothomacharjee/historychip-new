@extends('site.layouts.header')

@section('content')
    <div class="softsource-index-section1 position-relative">
        <video playsinline autoplay loop muted class="w-100">
            <source src="https://dk8gitnxkd9gd.cloudfront.net/banner.mp4" type="video/mp4">
            <source src="{{ asset('frontend/videos/banner.webm') }} assets/images/" type="video/mp4">
        </video>
        <div class="position-absolute top-50 start-50 translate-middle text-center px-5">
            <h1 class="text-white softsource-firstline-header">The story of our world is not complete until you add your
                story</h1>
            <div
                class="softsource-add-your-story-box softsource-add-your-story-box-transparent softsource-btn-hover-transition">
                <a href="https://www.historychip.com/submitastory"
                    class="softsource-add-your-story-box-btn softsource-add-your-story-box-btn-transparent softsource-btn-hover-transition">Add
                    Your Story</a>
                <div class="softsource-add-story-link softsource-add-story-link-transparent">
                    <a title="Add with Audio" href="https://www.historychip.com/submitastory?type=audio"><i
                            class="fa fa-music" aria-hidden="true"></i></a>
                    <a title="Add with Video" href="https://www.historychip.com/submitastory?type=audio"><i
                            class="fa fa-video" aria-hidden="true"></i></a>
                    <a title="Add Only Text" href="https://www.historychip.com/submitastory?type=text" class="music"><i
                            class="fa fa-file" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="position-absolute bottom-0 start-50 text-center mb-3 softsource-home-top-scroll">
            <a href="#next-section">
                <span></span>
                Scroll
            </a>
        </div>
    </div>



    <!-- Section 1: Daily Prompt Generator -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="mb-1">Daily Prompt Generator</h2>

                    <div class="softsource-word-text-box d-flex">
                        {{-- <textarea name="WordBox" id="wordbox" tabindex="0" rows="2"></textarea> --}}
                        <div id="wordbox" class="softsource-wordbox"></div>
                        <input type="hidden" value="0" id="word_index_prev" tabindex="-1">
                        <input type="hidden" value="0" id="word_index_curr" tabindex="-1">
                        <input type="BUTTON" value="GENERATE PROMPT" onclick="PickRandomWord();" id="button"
                            class="softsource-writing-prompt-button" tabindex="1">
                    </div>
                    <button type="button" class="softsource-btn-direction backBtn"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i></button>
                    <button type="button" class="softsource-btn-direction nextBtn"><i class="fa fa-arrow-right"
                            aria-hidden="true"></i></button>

                </div>
                <div class="col-4 text-center">
                    <div class="footer-box d-inline-block px-3 py-4">
                        <div class="softsource-add-your-story-box softsource-btn-hover-transition">
                            <a href="https://www.historychip.com/submitastory"
                                class="softsource-add-your-story-box-btn softsource-btn-hover-transition">Add
                                Your Story</a>
                            <div class="softsource-add-story-link">
                                <a title="Add with Audio" href="https://www.historychip.com/submitastory?type=audio"><i
                                        class="fa fa-music" aria-hidden="true"></i></a>
                                <a title="Add with Video" href="https://www.historychip.com/submitastory?type=audio"><i
                                        class="fa fa-video" aria-hidden="true"></i></a>
                                <a title="Add Only Text" href="https://www.historychip.com/submitastory?type=text"
                                    class="music"><i class="fa fa-file" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Featured Stories -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-title-wrap text-center mb-5">
                        <h2 class="new-theme">Featured Stories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 mt-0">
                            <!--======= Single Blog Item Start ========-->
                            <div class="softsource-single-blog-item blog-grid">
                                <!-- Post Feature Start -->
                                <div class="post-feature softsource-blog-thumbnail">
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('frontend/images/web_img/demo.jpg') }}"
                                            alt="Header Image" style="width: 370px;">
                                    </a>
                                </div>
                                <!-- Post Feature End -->
                                <!-- Post info Start -->
                                <div class="post-info lg-blog-post-info cust-story">
                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span class="far fa-user meta-icon"></span>
                                            <a href="#">
                                                Author Name
                                            </a>

                                        </div>
                                        <div class="softsource-h-line"></div>
                                    </div>
                                    <h5 class="post-title font-weight--bold pt-3">
                                        <a href="#">
                                            Story Title
                                        </a>
                                    </h5>
                                    <div class="post-excerpt">

                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text
                                            ever since the 1500s, when an unknown printer took a galley of type
                                            and scrambled it to make a type specimen book. It has survived not
                                            only five centuries,......
                                        </p>

                                    </div>

                                    <div style="width: 100%; height: 33px;">

                                        <audio style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%" controls
                                            controlsList="nodownload">
                                            <source src="">
                                            Your browser does not support the audio element.
                                        </audio>

                                    </div>
                                    <div class="btn-text">
                                        <a href="#">Read more
                                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 24H38" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M30 32L38 24" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M30 16L38 24" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- Post info End -->
                            </div>
                            <!--===== Single Blog Item End =========-->
                        </div>

                        <div class="col-lg-4 col-md-6 mt-0">
                            <!--======= Single Blog Item Start ========-->
                            <div class="softsource-single-blog-item blog-grid">
                                <!-- Post Feature Start -->
                                <div class="post-feature softsource-blog-thumbnail">
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('frontend/images/web_img/demo.jpg') }}"
                                            alt="Header Image" style="width: 370px;">
                                    </a>
                                </div>
                                <!-- Post Feature End -->
                                <!-- Post info Start -->
                                <div class="post-info lg-blog-post-info cust-story">
                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span class="far fa-user meta-icon"></span>

                                            <a href="#">
                                                Author Name
                                            </a>

                                        </div>
                                        <div class="softsource-h-line"></div>
                                    </div>
                                    <h5 class="post-title font-weight--bold pt-3">
                                        <a href="#">
                                            Story Title
                                        </a>
                                    </h5>
                                    <div class="post-excerpt">

                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text
                                            ever since the 1500s, when an unknown printer took a galley of type
                                            and scrambled it to make a type specimen book. It has survived not
                                            only five centuries,......
                                        </p>

                                    </div>

                                    <div style="width: 100%; height: 33px;">

                                        <audio style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%" controls
                                            controlsList="nodownload">
                                            <source src="">
                                            Your browser does not support the audio element.
                                        </audio>

                                    </div>
                                    <div class="btn-text">
                                        <a href="#">Read more
                                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 24H38" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M30 32L38 24" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M30 16L38 24" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- Post info End -->
                            </div>
                            <!--===== Single Blog Item End =========-->
                        </div>

                        <div class="col-lg-4 col-md-6 mt-0">
                            <!--======= Single Blog Item Start ========-->
                            <div class="softsource-single-blog-item blog-grid">
                                <!-- Post Feature Start -->
                                <div class="post-feature softsource-blog-thumbnail">
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('frontend/images/web_img/demo.jpg') }}"
                                            alt="Header Image" style="width: 370px;">
                                    </a>
                                </div>
                                <!-- Post Feature End -->
                                <!-- Post info Start -->
                                <div class="post-info lg-blog-post-info cust-story">
                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span class="far fa-user meta-icon"></span>

                                            <a href="#">
                                                Author Name
                                            </a>

                                        </div>
                                        <div class="softsource-h-line"></div>
                                    </div>
                                    <h5 class="post-title font-weight--bold pt-3">
                                        <a href="#">
                                            Story Title
                                        </a>
                                    </h5>
                                    <div class="post-excerpt">

                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text
                                            ever since the 1500s, when an unknown printer took a galley of type
                                            and scrambled it to make a type specimen book. It has survived not
                                            only five centuries,......
                                        </p>

                                    </div>

                                    <div style="width: 100%; height: 33px;">

                                        <audio style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%" controls
                                            controlsList="nodownload">
                                            <source src="">
                                            Your browser does not support the audio element.
                                        </audio>

                                    </div>
                                    <div class="btn-text">
                                        <a href="#">Read more
                                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 24H38" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M30 32L38 24" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M30 16L38 24" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- Post info End -->
                            </div>
                            <!--===== Single Blog Item End =========-->
                        </div>
                    </div>
                </div>

                <div class="section-under-heading text-center section-space--mt_40"></a></div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <button class="softsource-btn softsource-port-cust-btn"><i
                            class="flaticon-magnifying-glass"></i><span>READ MORE STORIES</span></button>
                </div>
            </div>
        </div>

    </section>

    <!-- Section 3: Search Stories -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-title-wrap text-center mb-5">
                        <h2 class="new-theme">Search Stories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <form class="softsource-port-form d-flex" method="GET" action="">
                        <select class="form-control softsource-custom-select story-category-select2" name='category_id'
                            id="category_id" required="">
                            <option value="">Please Select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                        <select class="form-control softsource-custom-select story-category-select2" name="sub_category_id_level_1" id="sub_category_id_level_1" disabled>

                        </select>
                        <button class="softsource-btn softsource-port-cust-btn"><i
                                class="flaticon-magnifying-glass"></i><span>Go</span></button>
                    </form>

                </div>

            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 ml-auto mr-auto">

                </div>
                <div class="col-md-4 col-md-4 ml-auto mr-auto mb-5">
                    <div class="_form_15"></div>
                    <script src="https://historychip.activehosted.com/f/embed.php?id=15" type="text/javascript" charset="utf-8"></script>
                </div>
                <div class="col-lg-4 col-md-4 ml-auto mr-auto mb-5">
                    <img src="{{ asset('frontend/images/web_img/quick-easy.png') }}" alt="writing tips quick easy">
                </div>
                <div class="col-lg-2 col-md-2 ml-auto mr-auto">

                </div>

                <div class="col-md-12 text-center">
                    <a class="softsource-btn btn-lg mt-4" href="{{ route('story.write') }}">Submit Your STORY</a>
                    {{-- <button class="softsource-btn btn-lg mt-4">Submit Your STORY</button> --}}
                </div>
            </div>

        </div>
    </section>

    <!-- Section 4: Intro of History Chip -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="mb-4">Intro of History Chip</h2>
                    <p>History Chip is a place where EVERYONE, ANYWHERE, is invited to share true stories. It’s
                        that
                        simple! All of our stories together are the BIG PICTURE. That’s why I built this site,
                        because
                        EVERYBODY should be part of the story of our world. It’s like a huge library written by
                        all of
                        us. Join me and be part of the story!</p>
                </div>
                <div class="col-md-4 text-center">
                    {{-- <button class="softsource-btn btn-lg mt-4">Submit Your STORY</button> --}}
                    <a class="softsource-btn btn-lg mt-4" href="{{ route('story.write') }}">Submit Your STORY</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Latest Blogs -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-title-wrap text-center mb-5">
                        <h2 class="new-theme">Featured Blogs</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 mt-0">
                            <!--======= Single Blog Item Start ========-->
                            <div class="softsource-single-blog-item blog-grid">
                                <!-- Post Feature Start -->
                                <div class="post-feature softsource-blog-thumbnail">
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('frontend/images/web_img/demo.jpg') }}"
                                            alt="Header Image" style="width: 370px;">
                                    </a>
                                </div>
                                <!-- Post Feature End -->
                                <!-- Post info Start -->
                                <div class="post-info lg-blog-post-info cust-story">
                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span class="far fa-user meta-icon"></span>

                                            <a href="#">
                                                Author Name
                                            </a>

                                        </div>
                                        <div class="softsource-h-line"></div>
                                    </div>
                                    <h5 class="post-title font-weight--bold pt-3">
                                        <a href="#">
                                            Blog Title
                                        </a>
                                    </h5>
                                    <div class="post-excerpt">

                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text
                                            ever since the 1500s, when an unknown printer took a galley of type
                                            and scrambled it to make a type specimen book. It has survived not
                                            only five centuries,......
                                        </p>

                                    </div>

                                    <div style="width: 100%; height: 33px;">

                                        <audio style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%" controls
                                            controlsList="nodownload">
                                            <source src="">
                                            Your browser does not support the audio element.
                                        </audio>

                                    </div>
                                    <div class="btn-text">
                                        <a href="#">Read more
                                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 24H38" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M30 32L38 24" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M30 16L38 24" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- Post info End -->
                            </div>
                            <!--===== Single Blog Item End =========-->
                        </div>

                        <div class="col-lg-4 col-md-6 mt-0">
                            <!--======= Single Blog Item Start ========-->
                            <div class="softsource-single-blog-item blog-grid">
                                <!-- Post Feature Start -->
                                <div class="post-feature softsource-blog-thumbnail">
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('frontend/images/web_img/demo.jpg') }}"
                                            alt="Header Image" style="width: 370px;">
                                    </a>
                                </div>
                                <!-- Post Feature End -->
                                <!-- Post info Start -->
                                <div class="post-info lg-blog-post-info cust-story">
                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span class="far fa-user meta-icon"></span>

                                            <a href="#">
                                                Author Name
                                            </a>

                                        </div>
                                        <div class="softsource-h-line"></div>
                                    </div>
                                    <h5 class="post-title font-weight--bold pt-3">
                                        <a href="#">
                                            Blog Title
                                        </a>
                                    </h5>
                                    <div class="post-excerpt">

                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text
                                            ever since the 1500s, when an unknown printer took a galley of type
                                            and scrambled it to make a type specimen book. It has survived not
                                            only five centuries,......
                                        </p>

                                    </div>

                                    <div style="width: 100%; height: 33px;">

                                        <audio style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%" controls
                                            controlsList="nodownload">
                                            <source src="">
                                            Your browser does not support the audio element.
                                        </audio>

                                    </div>
                                    <div class="btn-text">
                                        <a href="#">Read more
                                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 24H38" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M30 32L38 24" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M30 16L38 24" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- Post info End -->
                            </div>
                            <!--===== Single Blog Item End =========-->
                        </div>

                        <div class="col-lg-4 col-md-6 mt-0">
                            <!--======= Single Blog Item Start ========-->
                            <div class="softsource-single-blog-item blog-grid">
                                <!-- Post Feature Start -->
                                <div class="post-feature softsource-blog-thumbnail">
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('frontend/images/web_img/demo.jpg') }}"
                                            alt="Header Image" style="width: 370px;">
                                    </a>
                                </div>
                                <!-- Post Feature End -->
                                <!-- Post info Start -->
                                <div class="post-info lg-blog-post-info cust-story">
                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span class="far fa-user meta-icon"></span>

                                            <a href="#">
                                                Author Name
                                            </a>

                                        </div>
                                        <div class="softsource-h-line"></div>
                                    </div>
                                    <h5 class="post-title font-weight--bold pt-3">
                                        <a href="#">
                                            BLog Title
                                        </a>
                                    </h5>
                                    <div class="post-excerpt">

                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text
                                            ever since the 1500s, when an unknown printer took a galley of type
                                            and scrambled it to make a type specimen book. It has survived not
                                            only five centuries,......
                                        </p>

                                    </div>

                                    <div style="width: 100%; height: 33px;">

                                        <audio style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%" controls
                                            controlsList="nodownload">
                                            <source src="">
                                            Your browser does not support the audio element.
                                        </audio>

                                    </div>
                                    <div class="btn-text">
                                        <a href="#">Read more
                                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 24H38" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M30 32L38 24" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M30 16L38 24" stroke="#3D5762" stroke-width="0.7"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- Post info End -->
                            </div>
                            <!--===== Single Blog Item End =========-->
                        </div>
                    </div>
                </div>
                <!-- <div class="section-under-heading text-center section-space--mt_40"></a></div> -->
                <div class="col-3"></div>
                <div class="col-6 text-center mt-5">
                    <form class="newsletter-form">
                        <h3>Sign-up for our newsletter</h3>
                        <div class="input-group mb-3 mt-2">
                            <input type="email" class="form-control" placeholder="Email address" id="email"
                                required>
                            <button class="softsource-btn" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </section>

    <script>
            $(document).ready(function() {
                $('.story-category-select2').select2({
                    maximumSelectionLength: 3,
                    placeholder: "Please Select"
                });

            });

        function stopTimer() {
            window.clearInterval(timerID);
        }

        function PlayVideo_Index() {
            if (whichState === 0) {
                stopTimer();
                $(".softsource-video-link .ht-popup-video.video-button").css("display", "none");
                $("#softsource-pop-hc-video").removeClass("d-none");
                $("#softsource-pop-hc-video")[0].play();
                whichState = 1;
                $(".softsource-video-close").removeClass("d-none");
            } else {
                $("#softsource-pop-hc-video")[0].pause();
                $("#softsource-pop-hc-video").addClass("d-none");
                $(".softsource-video-link .ht-popup-video.video-button").css("display", "block");
                whichState = 0;
                $(".softsource-video-close").addClass("d-none");
            }
        }

        function onVideoEnd() {
            //stop copying frames to canvas for the current video element
            stopTimer();

            $("#softsource-pop-hc-video").addClass("d-none");
            $(".softsource-video-link .ht-popup-video.video-button").css(
                "display",
                "block"
            );

            whichState = 0;
            $(".softsource-video-close").addClass("d-none");
        }

        $("#softsource-pop-hc-video").on("ended", onVideoEnd);
    </script>
@endsection
