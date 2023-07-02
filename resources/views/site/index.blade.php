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
            <h1 class="text-white text-end softsource-firstline-header">The story of our world is not complete until you add
                your story
            </h1>
        </div>

        <div class="position-absolute  softsource-home-responsive-btn" style="display: none">
            <a href="{{ route('register') }}" class="btn softsource-home-btn-register">Register</a>
            <a href="{{ route('login') }}" class="btn softsource-home-btn-login">Login</a>
        </div>

        <div class="position-absolute text-center mb-3 softsource-home-top-scroll">
            <div class="softsource-home-hero-horizontal-lines-div">
                <div class="softsource-home-hero-horizontal-line line-1"></div>
                <span class="softsource-horizontal-text">SCROLL DOWN</span>
                <div class="softsource-home-hero-horizontal-line line-2"></div>
            </div>

            <div class="softsource-scroll-now-div">
                <a href="#sec-2">
                    <div class="softsource-scroll-down"></div>
                </a>
            </div>
        </div>
    </div>



    <!-- Section 1: Daily Prompt Generator -->
    <section class="py-5 my-5 softsource-home-daily-prompt-div" id="sec-2">
        <div class="container">
            <div class="row">
                <div
                    class="col-md-12 col-xxl-12 col-xl-10 col-lg-10 col-12 col-sm-12 mx-auto d-flex softsource-home-daily-prompt text-center">
                    <div class="softsource-home-daily-prompt-genrator">
                        <h2 class="text-center softsource-home-daily-prompt-header">Daily Prompt Generator</h2>
                        <div class="softsource-home-daily-prompt-word-text-box d-flex mx-5">
                            <div id="softsource-wordbox" class="softsource-wordbox"></div>
                            <input class="ms-auto generate-prompt-button" type="BUTTON" value="Generate"
                                tabindex="0">
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
                            <a title="Add with Audio" href="https://www.historychip.com/submitastory?type=audio"><img
                                    src="{{ asset('frontend/images/web_img/microphone.svg') }}" /></a>
                            <a title="Add with Video" href="https://www.historychip.com/submitastory?type=audio"><img
                                    src="{{ asset('frontend/images/web_img/video.svg') }}" /></a>
                            <a title="Add Only Text" href="https://www.historychip.com/submitastory?type=text"
                                class="music"><img src="{{ asset('frontend/images/web_img/text.svg') }}" /></a>
                        </div>
                        <a href="{{ route('story.write') }}"
                            class="btn softsource-home-daily-prompt-submit-story-btn">Submit Your Stories</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Featured Stories -->
    @if (!empty($fetured_stories))
        <section class="py-5 my-5">
            <div class="row mx-1 px-5">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="softsource-home-fetured-story-section-title-wrap text-center mb-5 ps-5 d-flex">
                        <div class="softsource-home-fetured-story-top-title">Featured &nbsp;<span> Stories</span></div>
                        <div class="softsource-home-fetured-story-horizontal-line"></div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">

                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            @foreach ($fetured_stories as $key => $story)
                                @php

                                    if ($story->header_image_path == '') {
                                        $headerImage = '/storage/frontend/stories/images/Banner72pi2.jpg';
                                    } else {
                                        $headerImage = $story->header_image_path;
                                    }
                                @endphp
                                <div
                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-5 animate__animated fadeInUp">
                                    <div class="softsource-story-item-div card">
                                        <div class="softsource-story-item-image text-center">
                                            <a href="{{ url($story->url) }}">
                                                <img class="img-fluid" src="{{ asset($headerImage) }}"
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
                                                <a href="{{ url($story->url) }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title=""
                                                    data-bs-original-title="{{ $story->title }}">{{ strlen($story->title) > 18 ? substr($story->title, 0, 18) . ' . . .' : $story->title }}</a>
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
                </div>
                <div class="row mt-3">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <a href="{{ route('story.read') }}"
                            class="btn softsource-home-fetured-story-read-more-story-btn px-5">Read More Stories</a>
                    </div>
                </div>
            </div>

        </section>
    @endif


    <!-- Section 3: Search Stories -->
    <section class="bg-light py-5 mt-5">
        <div class="container">
            <div class="row ">
                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="softsource-home-search-story-section-title-wrap mb-5">
                        <div class="softsource-home-search-story-title">Search<span> Stories</span></div>
                        <div class="softsource-home-search-story-horizontal-line"></div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="softsource-home-search-story-section-category-wrap p-3">
                        <form class="softsource-home-search-story-form d-flex px-5" method="Post" action="">
                            <div class="">
                                <label for="category_id"
                                    class="form-label softsource-home-search-story-form-category-label">Select
                                    Category</label>
                                <select class="form-control softsource-home-search-story-form-category-select"
                                    name='category_id' id="category_id" required>
                                    <option value="">Please Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="">
                                <label for="sub_category_id_level_1"
                                    class="form-label softsource-home-search-story-form-category-label">Select Sub
                                    Category</label>
                                <select class="form-control softsource-home-search-story-form-category-select"
                                    name="sub_category_id_level_1" id="sub_category_id_level_1" disabled>

                                </select>
                            </div>
                            <div class="mt-4">

                                <button
                                    class="btn softsource-home-search-story-form-category-button gobtn"><span>Go</span></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Writing Prompt -->
    <section class="py-5 softsource-home-writing-prompt-section">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="softsource-home-search-writing-prompt-title-wrap mb-5">
                        <div class="softsource-home-writing-prompt-title mt-5">Want Writing Prompts?
                        </div>
                        <div class="">
                            <a href="{{ route('story.write') }}"
                                class="btn softsource-home-fetured-story-read-more-story-btn px-5">Submit Your Story</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="_form_17"></div>
                    <script src="https://historychip.activehosted.com/f/embed.php?id=17" type="text/javascript" charset="utf-8"></script>
                    <!-- <div class="_form_15"></div>
                                                    <script src="https://historychip.activehosted.com/f/embed.php?id=15" type="text/javascript" charset="utf-8"></script> -->
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Intro of History Chip -->
    <section class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-5">
                    <h2 class="softsource-home-intro-title mb-4">Intro of <br><span>HistoryChip</span></h2>
                    <p class="softsource-home-intro-sub-title">History Chip is a place where EVERYONE, ANYWHERE, is invited
                        to share true stories. It’s that simple!
                        All of our stories together are the BIG PICTURE. That’s why I built this site, because EVERYBODY
                        should be part of the story of our world. It’s like a huge library written by all of us. Join me and
                        be part of the story!</p>
                    <a class="btn softsource-home-fetured-story-read-more-story-btn mt-4 px-5"
                        href="{{ route('story.read') }}">Read More Story</a>
                </div>
                <div
                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 text-center softsource-home-intro-second-div">
                    <img src="{{ asset('frontend/images/web_img/hc-world.svg') }}" alt="History Chip Intro"
                        class="img-fluid w-100">
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: Featured Blogs -->
    @if (!empty($fetured_blogs))
        <section class="my-5 py-5">
            <div class="row mx-1 px-5">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="softsource-home-fetured-story-section-title-wrap text-center mb-5 ps-5 d-flex">
                        <div class="softsource-home-fetured-blog-horizontal-line"></div>
                        <div class="softsource-home-fetured-blog-top-title">Featured &nbsp;<span> Blogs</span></div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">

                <div class="row mt-3">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            @foreach ($fetured_blogs as $key => $blog)
                                @php
                                    if ($blog->blog_banner == '') {
                                        $blog_banner = '/storage/frontend/stories/images/Banner72pi2.jpg';
                                    } else {
                                        $blog_banner = $blog->blog_banner;
                                    }
                                @endphp
                                <div
                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-0 mb-5 animate__animated fadeInUp">
                                    <!--======= Single Blog Item Start ========-->
                                    <div class="softsource-single-blog-item card blog-grid">
                                        <!-- Post Feature Start -->
                                        <div class="post-feature softsource-blog-thumbnail">
                                            <a href="{{ url($blog->url) }}">
                                                <img class="img-fluid" src="{{ asset($blog_banner) }}"
                                                    alt="{{ $blog->blog_banner_alt_text }}" style="width: 370px; height:208px">
                                            </a>
                                        </div>
                                        <!-- Post Feature End -->
                                        <!-- Post info Start -->
                                        <div class="post-info lg-blog-post-info cust-story">
                                            <div class="post-meta">
                                                <div class="post-date">
                                                    <span class="far fa-user meta-icon"></span>

                                                    {{ date('M d Y', strtotime($blog->blog_date)) }}

                                                </div>
                                                <div class="softsource-h-line"></div>
                                            </div>
                                            <h5 class="post-title font-weight--bold pt-3">

                                                <a href="{{ url($blog->url) }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title=""
                                                    data-bs-original-title="{{ $blog->blog_title }}">{{ strlen($blog->blog_title) > 18 ? substr($blog->blog_title, 0, 18) . ' . . .' : $blog->blog_title }}</a>
                                            </h5>
                                            <div class="post-excerpt">

                                                <p>
                                                    {{ strlen(strip_tags($blog->blog_description)) > 100 ? substr(strip_tags($blog->blog_description), 0, 100) . ' . . .' : strip_tags($blog->blog_description) }}
                                                </p>

                                            </div>
                                            <div class="btn-text">
                                                <a href="{{ url($blog->url) }}">Read more
                                                    <svg width="48" height="48" viewBox="0 0 48 48"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            @endforeach
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                            <a href="{{ route('story.read') }}"
                                class="btn softsource-home-fetured-story-read-more-story-btn px-5">Read More Stories</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Section 7: News Letter -->
    <section class="py-5 my-5">
        <div class="container">
            <div class="row softsource-home-newsletter-div">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mx-auto mt-5 pt-5">
                    <h3 class="softsource-home-newsletter-title"><span>Sign-up</span> for our newsletter</h3>
                </div>
                <div class="dflex-innews-letter col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mx-auto">
                    <form class="softsource-newsletter-form">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control softsource-home-newsletter-input"
                                placeholder="Email address" id="email" required
                                aria-describedby="button_newsletter_button" aria-label="Email address">
                            <button class="btn softsource-home-newsletter-btn" type="submit"
                                id="button_newsletter_button">Subscribe</button>
                        </div>
                        {{-- <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" >
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                          </div> --}}
                    </form>
                </div>

            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {

            $.ajax({
                type: 'POST',
                url: '{{ route('writing-prompts.get') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                },
                success: function(data) {
                    //console.log('writingprompt', data.writingprompt);
                    NumberOfWords = data.writingprompt.length;
                    words = new BuildArray(NumberOfWords);

                    for (let i = 0; i < NumberOfWords; i++) {

                        if (data.writingprompt[i].details == '') {
                            words[i] = `Write Something On "${data.writingprompt[i].title}"`;
                        } else {
                            words[i] = data.writingprompt[i].details;

                        }
                    }


                }
            });


            $(".generate-prompt-button").click(function() {
                PickRandomWord();
            });

            $(".backBtn").click(function() {
                $(".softsource-wordbox").html(words[$("#word_index_prev").val()]);
            });

            $(".nextBtn").click(function() {
                $(".softsource-wordbox").html(words[$("#word_index_curr").val()]);
            });

        })

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

        let history = ['0', '0', '0'];
        var words = [];
        var NumberOfWords = 0;

        $(document).ready(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('writing-prompts.get') }}",
                data: {
                    '_token': '{{ csrf_token() }}',
                },
                success: function(data) {
                    //console.log('writingprompt', data.writingprompt);
                    NumberOfWords = data.writingprompt.length;
                    words = new BuildArray(NumberOfWords);

                    for (let i = 0; i < NumberOfWords; i++) {

                        if (data.writingprompt[i].details == '') {
                            words[i] = `Write Something On "${data.writingprompt[i].title}"`;
                        } else {
                            words[i] = data.writingprompt[i].details;

                        }
                    }


                }
            });


            $(".backBtn").click(function() {
                $(".softsource-wordbox").html(words[$("#word_index_prev").val()]);
            });

            $(".nextBtn").click(function() {
                $(".softsource-wordbox").html(words[$("#word_index_curr").val()]);
            });

        })

        function BuildArray(size) {
            this.length = size
            for (var i = 1; i <= size; i++) {
                this[i] = null
            }
            return this
        }

        function PickRandomWord() {
            // Generate a random number between 1 and NumberOfWords
            var rnd = Math.ceil(Math.random() * NumberOfWords)

            // Display the word inside the text box
            $(".softsource-wordbox").html(words[rnd]);
            $("#word_index_prev").val($("#word_index_curr").val());
            $("#word_index_curr").val(rnd);

        }
    </script>
@endsection
