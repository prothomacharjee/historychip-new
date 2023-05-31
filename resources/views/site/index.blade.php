@extends('site.layouts.header')

@section('content')
    <!-- Home Top Section -->
    <div class="softsource-index-section1 position-relative">
        <div class="softsource-home-heroo-video-div">
            <video playsinline="" autoplay="" loop="" muted="" class="w-100">
                <!-- <source src="https://dk8gitnxkd9gd.cloudfront.net/banner.mp4" type="video/mp4"> -->
                <source src="{{ asset('frontend/videos/banner.webm') }}" type="video/mp4">
            </video>
            <!-- <img src="banner.gif"/> -->
            <div class="softsource-video-overlay"></div>
        </div>

        <div class="position-absolute top-50 text-end softsource-home-text-over-video-div">
            <h1 class="text-white text-end softsource-firstline-header">The <span
                    class="softsource-firstline-header-inside">story</span> of our world is not complete until you add your
                <span class="softsource-firstline-header-inside">story</span>
            </h1>
        </div>
        <div class="position-absolute text-center mb-3 softsource-home-top-scroll">
            <div class="softsource-horizontal-lines-div">
                <div class="softsource-horizontal-line line-1"></div>
                <span class="softsource-horizontal-text">SCROLL DOWN</span>
                <div class="softsource-horizontal-line line-2"></div>
            </div>

            <div class="softsource-scroll-now-div">
                <a href="#sec-2">
                    <div class="softsource-scroll-down"></div>
                </a>
            </div>
        </div>
    </div>



    <!-- Section 1: Daily Prompt Generator -->
    <section class="py-5 softsource-home-daily-prompt-div" id="sec-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto d-flex softsource-home-daily-prompt text-center">
                    <div class="softsource-home-daily-prompt-genrator">
                        <h2 class="text-center softsource-home-daily-prompt-header">Daily Prompt Generator</h2>
                        <div class="softsource-home-daily-prompt-word-text-box d-flex mx-5">
                            <div id="wordbox" class="wordbox"></div>
                            <input class="ms-auto" type="BUTTON" value="GENERATE PROMPT" tabindex="0">
                        </div>
                        <!-- <div class="text-start">

                                                <button type="button" class="btn-direction backBtn"><i class="fa fa-arrow-left"
                                                        aria-hidden="true"></i></button>
                                                <button type="button" class="btn-direction nextBtn"><i class="fa fa-arrow-right"
                                                        aria-hidden="true"></i></button>
                                            </div> -->
                    </div>
                    <div class="softsource-home-daily-prompt-add-story">
                        <div class="softsource-home-daily-prompt-add-story-link">
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
    </section>

    <!-- Section 2: Featured Stories -->
    @if (!empty($fetured_stories))
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

                            @foreach ($fetured_stories as $key => $story)
                                @php

                                    if ($story->header_image_path == '') {
                                        $headerImage = '/storage/frontend/stories/images/Banner72pi2.jpg';
                                    } else {
                                        $headerImage = $story->header_image_path;
                                    }
                                @endphp
                                <div class="col-lg-4 col-md-6 mb-5 animate__animated fadeInUp">
                                    <div class="softsource-story-item-div">
                                        <div class="softsource-story-item-image text-center">
                                            <a href="{{ url($story->url) }}">
                                                <img class="img-fluid"
                                                    src="{{ asset($headerImage) }}"
                                                    alt="{{ $story->header_image_alt_text }}" style="width: 370px;">
                                            </a>
                                        </div>
                                        <div class="softsource-story-item-details">
                                            <div class="story-meta">
                                                <div class="story-date">
                                                    <span class="far fa-user meta-icon"></span>
                                                    @if (!$story->is_anonymous)
                                                        <a
                                                            href="{{ url('author/' . Str::slug($story->author_details->name)) }}">{{ $story->author_name }}</a>
                                                    @else
                                                        Anonymous
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="softsource-h-line"></div>
                                            <h5 class="story-title pt-3">
                                                <a href="{{ url($story->url) }}">{{ $story->title }}</a>
                                            </h5>
                                            <div class="story-excerpt mt-3">
                                                <p>{{ strlen(strip_tags($story->context)) > 100 ? substr(strip_tags($story->context), 0, 100) . ' . . .' : strip_tags($story->context) }}
                                                </p>
                                            </div>
                                            <div style="width: 100%; height: 33px;">
                                                @if ($story->audio_video_path)
                                                    @if (substr($story->audio_video_path, -4) == '.mp4' && $story->audioconvert == 0)
                                                        <video
                                                            style="width: 96%; height: 100px; margin-left: 2%; margin-right: 2%"
                                                            controls controlsList="nodownload">
                                                            <source src="{{ $story->audio_video_path }}">
                                                            Your browser does not support the audio element.
                                                        </video>
                                                    @else
                                                        <audio
                                                            style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%"
                                                            controls controlsList="nodownload">
                                                            <source src="{{ $story->audio_video_path }}">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="softsource-story-btn-text">
                                                <a href="{{ url($story->url) }}">Read more <i
                                                        class="ml-1 button-icon fas fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="section-under-heading text-center section-space--mt_40"></a></div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <a href="{{ route('story.read') }}" class="softsource-btn">READ MORE STORIES</a>
                    </div>
                </div>
            </div>

        </section>
    @endif


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
                        <select class="form-control softsource-custom-select story-category-select2"
                            name="sub_category_id_level_1" id="sub_category_id_level_1" disabled>

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
