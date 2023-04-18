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

    <section class="softsource-index-section2 py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4>Your donations will help History Chip raise the voices of all people all over the world,
                        including those whose voices couldn't be heard before, while, at the same time, it fulfills
                        its promise to provide more truth to history.</h4>
                </div>
                <div class="col-md-6 text-center">
                    <p><a href="/donation" class="btn softsource-btn softsource-donation-btn">Donate Now</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="softsource-index-section3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center">
                    <h5>You are not ordinary,
                        <br>you are extraordinary.
                    </h5>
                    <p>We invite people like you, extraordinary people from all walks of life, living in different
                        places to share their life experiences.</p>
                </div>
                <div class="col-md-6 text-center">
                    <p>Watch Video</p>
                    <a onclick="PlayVideo_Index();" return="" false;" id="startPlayback" class="softsource-video-link">
                        <img src="{{ asset('frontend/images/web_img/play-btn.png') }}" class="img-fluid">
                    </a>
                    <div class="softsource-h-video">
                        <video id="softsource-pop-hc-video" width="750" height="560" controls="" class="d-none">
                            <source type="video/mp4" src="{{ asset('frontend/videos/pop-hc.mp4') }}">
                            Your browser does not support playing this Video
                        </video>
                        <span class="softsource-video-close d-none" onclick="PlayVideo_Index()"><i
                                class="fa fa-xmark fa-sm"></i></span>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="softsource-index-section4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p>Our mission is to celebrate the stories of all humans and open up the world of human resilience,
                        triumph, and everyday experiences to our readers and storytellers.</p>
                    <!-- <h5>The stories we tell today are the success stories of yesterday. </h5> -->
                    <a href="/about" class="softsource-learn-more mt-3">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <section class="softsource-index-section5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 softsource-index-section5-left-part text-center">
                    <h4>Our memories are fallible, <br>
                        that's why we want your story to expand the truth of our world.</h4>
                    <p>History Chip is your voice, your writing, your story and an essential part of the majestic
                        history of our world.</p>
                </div>
                <div class="col-md-5 softsource-index-section5-right-part text-center">
                    <img src="{{ asset('frontend/images/web_img/add-story-bg.jpg') }}" class="img-fluid w-100"
                        alt="success stories">
                    <a href="/submitastory" class="softsource-learn-more">Add Your Story</a>
                </div>
            </div>
        </div>
    </section>

    <section class="softsource-index-section6">
        <div class="form-sec">
            <label for="cars">Search Stories</label>
            <form class="softsource-port-form" method="GET" action="">
                <select class="softsource-custom-select softsource-select2" name='category' id="category" required="">
                    <option selected="" value=""> - Search by category -</option>
                    <?php
                if (count($categories) > 0) {
                    foreach ($categories as $category) {
                        ?>
                    <option value="<?php echo $category['category_name']; ?>" data-id="<?php echo $category['id']; ?>">
                        <?php echo $category['category_name']; ?></option>
                    <?php
                    }
                }
                ?>
                </select>
                <select class="softsource-custom-select softsource-select2" name="sub_category" id="sub_category">
                    <option selected="" value="">Choose a Sub-category</option>
                </select>
                <button class="softsource-btn softsource-port-cust-btn"><i
                        class="flaticon-magnifying-glass"></i><span>Go</span></button>
            </form>
        </div>
    </section>

    <section class="py-0 softsource-index-section7">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-title-wrap text-center mb-5">
                        <h4 class="new-theme">Recent Story Chips</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <?php
                        foreach ($stories as $story) {


                            $headerImage = '';

                            if (is_null($story->header_image_path) or $story->header_image_path == "") {
                                $headerImage = "/assets/img/stories/Banner72pi2.jpg";
                            } else {
                                $headerImage = $story->header_image_path;
                            }

                            if ($story->anonymous || strcmp(env("STORY_LINK_TO_AUTHOR", "false"), "true") != 0) {
                                $authorLink = $story->author;
                            }

                            $audioPath = null;
                            $audioPath = null;
                            if ($story->audio_relative_path) {
                                $audioPath = asset($story->audio_relative_path);
                            }
                            ?>
                        <div class="col-lg-4 col-md-6 mt-0">
                            <!--======= Single Blog Item Start ========-->
                            <div class="softsource-single-blog-item blog-grid">
                                <!-- Post Feature Start -->
                                <div class="post-feature softsource-blog-thumbnail">
                                    <a href="/stories/<?php echo $story->id; ?>">
                                        <img class="img-fluid" src="<?php echo $headerImage; ?>" alt="<?php echo $story->title; ?>"
                                            style="width: 370px;">
                                    </a>
                                </div>
                                <!-- Post Feature End -->
                                <!-- Post info Start -->
                                <div class="post-info lg-blog-post-info cust-story">
                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span class="far fa-user meta-icon"></span>
                                            <?php
                                            if ($story->anonymous || strcmp(env('STORY_LINK_TO_AUTHOR', 'false'), 'true') != 0) {
                                                $authorLink = $story->author;
                                            }
                                            ?>
                                            <a href="/author/<?php echo $story->author_id; ?>"><?php echo $story->author; ?></a>

                                        </div>
                                        <div class="softsource-h-line"></div>
                                    </div>
                                    <h5 class="post-title font-weight--bold pt-3">
                                        <a href="/stories/<?php echo $story->id; ?>"><?php echo strip_tags(substr($story->title, 0, 30)); ?></a>
                                    </h5>
                                    <div class="post-excerpt">
                                        <p>

                                        <p><?php echo strip_tags(substr(preg_replace('/<img[^>]+\>/i', '', $story->context), 0, 120)); ?>......
                                        </p>
                                        </p>
                                    </div>

                                    <div style="width: 100%; height: 33px;">
                                        @if ($audioPath)
                                            <audio style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%"
                                                controls controlsList="nodownload">
                                                <source src="{{ $audioPath }}">
                                                Your browser does not support the audio element.
                                            </audio>
                                        @endif
                                    </div>
                                    <div class="btn-text">
                                        <a href="/stories/<?php echo $story->id; ?>">Read more
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
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="section-under-heading text-center section-space--mt_40"></a></div>
            </div>
        </div>
    </section>

    <script>
        function stopTimer() {
            window.clearInterval(timerID);
        }

        function PlayVideo_Index() {
            if (whichState === 0) {
                stopTimer();
                $(".softsource-video-link .ht-popup-video.video-button").css( "display","none");
                $("#softsource-pop-hc-video").removeClass("d-none");
                $("#softsource-pop-hc-video")[0].play();
                whichState = 1;
                $(".softsource-video-close").removeClass("d-none");
            }
            else {
                $("#softsource-pop-hc-video")[0].pause();
                $("#softsource-pop-hc-video").addClass("d-none");
                $(".softsource-video-link .ht-popup-video.video-button").css("display","block");
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
