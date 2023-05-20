@extends('site.layouts.header')

@php
    if ($detail) {
        $authorIdentity = $stories->is_anonymous ? 'A story by Anonymous' : "A story by $stories->author_name";
    }

@endphp

@section('content')


    @if (!$detail)
        <style scoped>
            .softsource-top-contianer {
                background-image: url("{{ asset('frontend/images/web_img/about-banner.jpg') }}");
                background-position: center;
                background-size: cover;
            }
        </style>
    @endif

    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ms-auto me-auto">
                    <div class="position-relative">
                        <div class="text-center softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text">{{ $page_title }}</h1>
                            @if ($detail)
                                <p class="text-white mb-0 softsoutce-top-banner-paragraph">
                                    <span class="far fa-user meta-icon">
                                        @if ($stories->is_anonymous)
                                            A story by Anonymous
                                        @else
                                            <a href="{{ url('author/' . Str::slug($stories->author_details->name)) }}">A
                                                story by {{ $stories->author_name }}</a>
                                        @endif
                                    </span>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="softsource-story-section pt-5">
        <div class="container">
            <div class="row">

                @if ($detail)
                    <div class="col-lg-8  m-auto">
                        <div class="story-feature story-single blog-thumbnail  wow move-up animated"
                            style="visibility: visible;">
                            @php
                                if (is_null($stories->header_image_path) or $stories->header_image_path == '') {
                                    $headerImage = asset('frontend/images/web_img/LargeBanner.jpg');
                                } else {
                                    $headerImage = $stories->header_image_path;
                                }
                            @endphp
                            <img style="width:100%;" class="img-fluid" src="<?php echo $headerImage; ?>" alt="<?php echo $stories->header_image_alt_text; ?>">
                        </div>
                        <?php if ($stories->photo_credit!=null):?>
                        <div class="row">
                            <div class="col text-end">
                                <p>Photo Credit: <?php echo $stories->photo_credit; ?></p>
                            </div>
                        </div>
                        <?php endif?>
                    </div>
                    @if ($stories->audio_video_path)
                        @if (substr($stories->audio_video_path, -4) == '.mp4' && $stories->is_audioconvert == 0)
                            <div class="col-lg-8  m-auto">
                                <video style="width: 80%;  margin-left: 10%; margin-top: 25px; margin-right: 10%" controls
                                    controlsList="nodownload">
                                    <source src="{{ $stories->audio_video_path }}">
                                    Your browser does not support the video element.
                                </video>
                            </div>
                        @else
                            <div class="col-lg-8  m-auto">
                                <audio
                                    style="width: 80%; height: 40px; margin-left: 10%; margin-top: 25px; margin-right: 10%"
                                    controls controlsList="nodownload">
                                    <source src="{{ $stories->audio_video_path }}">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        @endif
                        @if ($stories->audio_video_credit != null)
                            @if (substr($stories->audio_video_path, -4) == '.mp4' && $stories->is_audioconvert == 0)
                                <div class="row col-lg-8  m-auto">
                                    <div class="col-lg-10 m-auto text-end">
                                        <p>Video Credit: {{ $stories->audio_video_credit }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="row col-lg-8 m-auto">
                                    <div class="col-lg-10 m-auto text-end">
                                        <p>Audio Credit: {{ $stories->audio_video_credit }}</p>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endif

                    <div class="col-lg-8 m-auto">
                        <div class="main-story-wrap">
                            <div class="row">
                                <div class="col softsource-individual-story-text">
                                    <p>
                                        {!! $stories->contextForDisplay() !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 m-auto">
                        <div class="text-center" style="color:#778B91">
                            <b>Want to Share This Story with Friends?</b>
                            <div class=" text-center d-flex justify-content-center">
                                <button class="softsource-btn-social facebook" title="Share On Facebook">
                                    <img style="width:100%;" class="img-fluid"
                                        src="{{ asset('frontend/images/social-media/facebook.png') }}" alt="Facebook Share">
                                </button>
                                <button class="softsource-btn-social twitter" title="Share On Twitter">
                                    <img style="width:100%;" class="img-fluid"
                                        src="{{ asset('frontend/images/social-media/twitter.png') }}" alt="Twitter Share">
                                </button>
                                <button class="softsource-btn-social linkedin" title="Share On LinkedIn">
                                    <img style="width:100%;" class="img-fluid"
                                        src="{{ asset('frontend/images/social-media/linkedin.ico') }}"
                                        alt="LinkedIn Share">
                                </button>
                                <button class="softsource-btn-social whatsapp" title="Share On WhatsApp">
                                    <img style="width:100%;" class="img-fluid"
                                        src="{{ asset('frontend/images/social-media/whatsapp.png') }}"
                                        alt="WhatsApp Share">
                                </button>
                                <button class="softsource-btn-social telegram" title="Share On Telegram">
                                    <img style="width:100%;" class="img-fluid"
                                        src="{{ asset('frontend/images/social-media/telegram.png') }}"
                                        alt="Telegram Share">
                                </button>
                                <button class="softsource-btn-social mail" title="Send with Email">
                                    <img style="width:100%;" class="img-fluid"
                                        src="{{ asset('frontend/images/social-media/mail.png') }}" alt="Telegram Share">
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 d-flex justify-content-start m-auto softsource-story-border-bottom pb-4 mb-3">
                        @if ($stories->tags)
                            <div class="d-flex">
                                <div class="tagcloud-icon">
                                    <i class="fa fa-tags"></i>
                                </div>
                                <div class="tagcloud">
                                    &nbsp;{{ $stories->tags }}
                                </div>
                            </div>
                        @endif

                        @if ($stories->event_location)
                            <div class="d-flex ms-auto">
                                <div class="tagcloud-icon">
                                    <i class="fa fa-location-arrow"></i>
                                </div>
                                <div class="tagcloud preview-tag">
                                    &nbsp; {{ $stories->event_location }}
                                    <br>
                                    {{ (isset($stories->event_detail_dates) and $stories->event_detail_dates) != '' ? $stories->event_detail_dates : ($stories->event_dates != '' ? date('M d Y', strtotime($stories->event_dates)) : '') }}

                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="col-lg-8 m-auto softsource-story-comment-section softsource-story-border-bottom mb-3 pb-4">
                        <div id="commentmsg" class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2" style="display: none">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                                </div>
                                <div class="ms-3 msg-show">

                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>


                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                        style="background: transparent !important; color:#778b91 !important">
                                        Read Comments
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @if (Auth::check())
                                            @if (empty($comments))
                                                <div class="row align-items-center ">
                                                    <div class="col-lg-12 col-md-12">
                                                        NO COMMENTS YET....
                                                    </div>
                                                </div>
                                            @else
                                                @foreach ($comments as $comments)
                                                    <div class="row align-items-center ">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="bg-light p-2 border-bottom">
                                                                <div class="d-flex flex-row align-items-start"><img
                                                                        class="rounded-circle"
                                                                        src="/assets/img/profile/<?php echo !empty($commenter->image) ? $commenter->image : 'user4.jpg'; ?>"
                                                                        width="40">
                                                                    <p><?= $value['comment']->comment ?></p>

                                                                </div>
                                                                <div class="row">
                                                                    <div id="" class="col-md-6 text-start">
                                                                        <?= $commenter->name ?>
                                                                    </div>
                                                                    <div id="" class="col-md-6 text-end">
                                                                        <?= $value['comment']->commentdatetime ?>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @else
                                            <p
                                                style="font-size: 10px; text-align:justify; font-weight:700px; color: #ca0b0b">
                                                To leave a comment, please <a href="/login">Signin</a> or <a
                                                    href="/register">Register</a>.
                                            </p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @if (Auth::check())
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo"
                                            style="background: transparent !important; color:#778b91 !important">
                                            Write Comment
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row align-items-center">
                                                <div class="col-lg-12 col-md-12 mb-2">
                                                    <p
                                                        style="font-size: 10px; text-align:justify; font-weight:700px; color: #ca0b0b">
                                                        Note: Please be respectful of writers on History Chip and
                                                        refrain from criticism. Remember the stories on History Chip are
                                                        written from
                                                        the best recollections of the writers. All of our memories will
                                                        help to broaden the truth of history and we encourage you to
                                                        note your own memories of an event reflected in this story. If
                                                        you have a similar story, we also encourage you to add your
                                                        story on a new page.
                                                    </p>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="bg-light p-2">
                                                        <div class="d-flex flex-row align-items-start">
                                                            <img class="rounded-circle m-2"
                                                                src="{{ !empty(Auth::user()->image) ? Auth::user()->image : asset('frontend/images/web_img/user4.jpg') }}"
                                                                width="40">
                                                            <textarea maxlength="200" minlength="10" class="form-control ml-1 shadow-none textarea" id="message"></textarea>

                                                        </div>
                                                        <div id="counter" class="text-end"></div>
                                                        <div class="mt-2 text-end">
                                                            <button class="softsource-btn btn-primary btn-sm shadow-none"
                                                                type="button" id="commentpost">Post
                                                                Comment</button>
                                                            <button
                                                                class="softsource-btn btn-outline-primary btn-sm ms-3 shadow-none"
                                                                type="button" id="commentcancel">Cancel</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    @if (count($stories) > 0)
                        @foreach ($stories as $story)
                            <div class="col-lg-4 col-md-6 mb-5 animate__animated fadeInUp">
                                <div class="softsource-story-item-div">
                                    <div class="softsource-story-item-image text-center">
                                        <a href="{{ url($story->url) }}">
                                            <img class="img-fluid" src="{{ asset($story->header_image_path) }}"
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
                    @else
                        <div class="col-lg-12 col-md-12 text-center mb-5 animate__animated fadeInUp">
                            <h2>No stories found.</h2>
                        </div>
                    @endif
                    @if (count($stories) > 0)
                        <div class="row">
                            <div class="col-lg-12 col-md-12 text-center mb-5">
                                <div style="width: 280px;margin: 0 auto;"
                                    class="d-flex justify-content-center pagination">
                                    @csrf
                                    {!! $stories->links() !!}
                                </div>
                            </div>
                        </div>
                    @endif

                @endif


            </div>
        </div>
    </div>

    <style scoped>
        .shadow-none {
            box-shadow: none
        }

        .textarea {
            resize: none
        }
    </style>

    @if ($detail)
        <script type="text/javascript">
            function socialWindow(url) {
                var left = (screen.width - 570) / 2;
                var top = (screen.height - 570) / 2;
                var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;
                window.open(url, "NewWindow", params);
            }

            //function setShareLinks() {
            var pageUrl = encodeURIComponent(document.URL);
            var pageTitle = '<?php echo $stories->title; ?>';
            var tweet = encodeURIComponent($("meta[property='og:description']").attr("content"));

            $(".softsource-btn-social.facebook").on("click", function() {
                url = "https://www.facebook.com/sharer.php?u=" + pageUrl;
                socialWindow(url);
            });

            $(".softsource-btn-social.twitter").on("click", function() {
                url = "https://twitter.com/intent/tweet?url=" + pageUrl; //+ "&text=" + tweet;
                socialWindow(url);
            });

            $(".softsource-btn-social.linkedin").on("click", function() {
                url =
                    `https://www.linkedin.com/sharing/share-offsite/?url=${pageUrl}`; //"https://www.linkedin.com/sharing/share-offsite/?url={url}https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
                socialWindow(url);
            })

            $(".softsource-btn-social.whatsapp").on("click", function() {
                url =
                    `https://api.whatsapp.com/send?text=${pageUrl}`; //"https://www.linkedin.com/sharing/share-offsite/?url={url}https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
                socialWindow(url);
            })

            $(".softsource-btn-social.telegram").on("click", function() {
                url =
                    `https://telegram.me/share/url?url=${pageUrl}&text=${pageTitle}`; //"https://www.linkedin.com/sharing/share-offsite/?url={url}https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
                socialWindow(url);
            })

            $(".softsource-btn-social.mail").on("click", function() {
                url = 'mailto:?subject=' + pageTitle + '&body=Check out this site: ' + pageUrl +
                    '" title="Share by Email'; //"https://www.linkedin.com/sharing/share-offsite/?url={url}https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
                socialWindow(url);
            })

            //$email = 'mailto:?subject=' . $[post-title] . '&body=Check out this site: '. $[post-url] .'" title="Share by Email';

            //}

            document.addEventListener('DOMContentLoaded', function() {
                const messageEle = document.getElementById('message');
                const counterEle = document.getElementById('counter');

                if (messageEle != null && counterEle != null) {
                    const maxLength = messageEle.getAttribute('maxlength');

                    counterEle.innerHTML = `0/${maxLength}`;

                    messageEle.addEventListener('input', function(e) {
                        const target = e.target;
                        const currentLength = target.value.length;
                        counterEle.innerHTML = `${currentLength}/${maxLength}`;
                    });
                }

            });
            // commentpost commentcancel
            $(document).on("click", "#commentpost", function() {
                SaveComment();
            })

            $(document).on("click", "#commentcancel", function() {
                $("#message").val('');
                $("#collapseTwo").removeClass('show');
            })


            function SaveComment() {
                var message = $("#message").val();
                var storyId = "{{ $stories->id }}";
                // var username = "{{ isset(Auth::user()->name) }}";
                // var storytitle = "{{ $stories->title }}";

                $.ajax({
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    url: "{{ route('story.comment') }}",
                    type: "POST",
                    data: {
                        message: message,
                        storyId: storyId,
                        // username: username,
                        // storytitle: storytitle,
                    }, // /converting the form data into array and sending it to server
                    dataType: 'json',
                    success: function(response) {
                        //console.log(id);
                        if (response.response) {
                            $(".msg-show").html(`<h6 class="mb-0 text-success">${response.msg}</h6>`);
                            $("#message").val('');
                            $("#collapseTwo").removeClass('show');
                        } else {
                            $(".msg-show").html(`<h6 class="mb-0 text-danger">${response.msg}</h6>`);
                        }
                        $('#counter').html('0/200');
                        $("#commentmsg").show();

                    }
                });
            };
        </script>
    @endif
@endsection
