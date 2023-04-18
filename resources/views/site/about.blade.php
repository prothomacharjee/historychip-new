@extends('site.layouts.header')

@section('content')
    <!--============ Resolutions Hero Start ============-->
    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ms-auto me-auto">
                    <div class="position-relative">
                        <div class="text-center softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text">About Us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============ about Start ============-->
    <div class="softsource-about-us-middle-container pb-2">
        <div class="container">
            <div class="row align-items-center">
                <!--baseline-->
                <div class="col-lg-6 col-md-7 mt-5 mb-5">
                    <div class="softsource-about-us-middle-container-left-div">
                        <h3>About History Chip </h3>
                        <p class="text-justify">History is created one micro story at a time until it forms a
                            complete mosaic of the complexity and depth of our larger story. Many stories help fill out
                            the truth of our history. It’s like a jigsaw puzzle that requires all the pieces to present
                            the entire picture. Every puzzle piece is a “chip” of our history.</p>
                        <p class="text-justify">The history of the rich and powerful, the 1%, has its place, but
                            only if it sits alongside the rest of the world’s history. History Chip began in 2009 as an
                            effort to include the stories of the 99% previously left of out of history.</p>
                        <h4 class="mb-2">We want your stories included in history because: </h4>
                        <ul class="softsource-unorder-list">
                            <li>Multiple stories present the truth more accurately than only one person’s perspective or
                                recollection. </li>
                            <li>Without the stories of people of color, women, people in developing countries, and
                                others not usually included in historical documents, history just can’t be true,
                                complete, or accurate.</li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="position-relative softsource-about-us-middle-container-right-div">
                        <div class="position-relative ht-banner-01">
                            <img class="img-fluid" src="{{ asset('frontend/images/web_img/a-1.jpg') }}" alt="read a story">
                        </div>
                        <div class="position-relative ht-banner-02">
                            <img class="img-fluid border-radus-5 animation_images two wow fadeInDown"
                                src="{{ asset('frontend/images/web_img/a-2.jpg') }}" alt="stories to read online">
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 ms-auto me-auto">
                                <div class="position-relative">
                                    <div class="w-100 text-center">
                                        <a onclick="PlayVideo_About()" return false;" id="startPlayback" class="softsource-video-link softsource-about-video-link">
                                            <div class="video-content">
                                                <div class="softsource-video-button">
                                                    <div class="softsource-video-mark">
                                                        <div class="wave-pulse wave-pulse-1"></div>
                                                        <div class="wave-pulse wave-pulse-2"></div>
                                                    </div>
                                                    <div class="video-button__two">
                                                        <div class="video-play">
                                                            <span class="video-play-icon"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <video id="video1" width="640" height="360" hidden>
                                            <source type="video/mp4">
                                            Your browser does not support playing this Video
                                        </video>
                                        <div id="softsource-canvas-container">
                                            <canvas id="videoCanvas" width="640" height="360" />
                                        </div>
                                        <div role="controls">
                                            <div>
                                            </div>
                                            <div>
                                                <input type="hidden" id="playbackNum" value="1" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative ht-banner-03">
                            <img class="img-fluid"
                                src="{{ asset('frontend/images/web_img/a-3.jpg') }}" alt="share your story">
                        </div>
                        <div class="position-relative ht-banner-04">
                            <img class="img-fluid"
                                src="{{ asset('frontend/images/web_img/a-4.jpeg') }}" alt="what's your story">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <!--baseline-->
                <div class="col-lg-6 col-md-6 mt-5 mb-5">
                    <div class="softsource-about-us-bottom-container-left-div">
                        <img src="{{ asset('frontend/images/web_img/about-left-img.jpg') }} "
                            alt="Jackson Square in the French Quarter of New Orleans, Louisiana">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="softsource-about-us-bottom-container-right-div">
                        <h4 class="animatable fadeInUp">More stories create more opportunities to flesh out the truth.
                        </h4>
                        <p class="animatable fadeInUp">We want History Chip to redefine how we tell our history by
                            honoring everyone’s voice and everyone’s existence.
                            <br>People from every race and orientation, every income level, every industry, and every
                            way of life. We need to hear your first hand stories of your day-to-day life about bravery,
                            humility, survival, tribulations, inequality and acceptance.</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--============ About End ============-->
    <!--========== Call to Action Area Start ============-->
    <div class="softsource-mission-vision-area mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="softsource-mission-vision__block d-flex align-items-center">
                        <div class="softsource-mission-vision__icon">
                            <img src="{{ asset('frontend/images/web_img/mission.png') }}" alt="mission icon">
                        </div>
                        <div class="softsource-mission-vision__content">
                            <h4>Mission</h4>
                            <p>History Chip provides a platform for storytellers and readers that expands our
                                understanding of everyday experiences from all over the world.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="softsource-mission-vision__block d-flex align-items-center">
                        <div class="softsource-mission-vision__icon">
                            <img src="{{ asset('frontend/images/web_img/vision.png') }}" alt="vision icon">
                        </div>
                        <div class="softsource-mission-vision__content">
                            <h4>Vision</h4>
                            <p>History Chip revolutionizes the way we view history. By including stories from all of us,
                                History Chip provides a more complete picture of global history.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="softsource-mission-vision-sponsor-section mb-5" style="">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <div class="">
                            <a href="https://www.bizcatalyst360.com/about"><img src="{{ asset('frontend/images/web_img/bizcatalyst.png') }}" alt="Bizcatalyst 360 Logo"></a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">

                </div>
            </div>
        </div>
    </div>

    <script>
        var canvas = document.getElementById('videoCanvas'),
            context = canvas.getContext('2d');

        make_base();

        function make_base() {
            base_image = new Image();
            //src="/assets/images/banners/home-processing-video-intro-slider-slide-01-image-01.jpg"
            base_image.src = "{{ asset('frontend/images/banners/home-processing-video-intro-slider-slide-01-image-01.jpg') }}"
            base_image.onload = function() {
                context.drawImage(base_image, 0, 0);
            }
        }

        // var playCounter = 0;
        // var whichState = 0;

        $("#video1").attr("src", "{{ asset('frontend/videos/pop-hc.mp4') }}");

       // var timerID;

        var $canvas = $("#videoCanvas");
        var ctx = $canvas[0].getContext("2d");
        //$canvas[0].style.display = "none"

        function stopTimer() {
            window.clearInterval(timerID);
        }

        function PlayVideo_About() {
            if (whichState === 0) {
                stopTimer();
                $("#startPlayback").attr("src", "{{ asset('frontend/images/web_img/pause-circle-outline.svg') }}");
                $("#video1")[0].play();
                whichState = 1;
            } else {
                $("#startPlayback").attr("src", "{{ asset('frontend/images/web_img/caret-forward-circle-outline.svg') }}");
                $("#video1")[0].pause();
                make_base();
                whichState = 0;
            }
        }

        function drawImage(video) {
            //last 2 params are video width and height
            ctx.drawImage(video, 0, 0, 640, 360);
        }

        // copy video frame to canvas every 30 milliseconds
        $("#video1").on("play", function() {
            timerID = window.setInterval(function() {
                drawImage($("#video1")[0]);
            }, 30);
        });

        function onVideoEnd() {
            //stop copying frames to canvas for the current video element
            stopTimer();

            var $canvas = $("#videoCanvas");
            //$canvas[0].style.display = "none"
            whichState = 0;
            //IE fix
            if (!this.paused) this.pause();

            //var first = $("#firstLine");
            //first[0].style.display = "block"
            make_base();
            //var second = $("#secondLine");
            //second[0].style.display = "block"

            $("#startPlayback").attr("src", "{{ asset('frontend/images/web_img/caret-forward-circle-outline.svg') }}");
        }

        $("#video1").on("ended", onVideoEnd);
    </script>
@endsection
