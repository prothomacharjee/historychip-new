@extends('site.layouts.partner-header')

@section('content')
    <style scoped>
        .softsource-top-contianer {
            background-image: url("{{ asset($partner->banner) }}");
            background-position: center;
            background-size: cover;
            padding-top: 300px;
            padding-bottom: 300px;
        }
    </style>



    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ms-auto me-auto">
                    <div class="position-relative">
                        <div class="text-left softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text fw-bold">{{ $page_title }}</h1>

                        </div>
                    </div>
                </div>

                <div class="col-12 text-center">
                    <div class="footer-box d-inline-block px-3 py-2">
                        <div class="softsource-add-your-story-box softsource-btn-hover-transition">
                            <a href="{{ route('story.write') }}"
                                class="softsource-add-your-story-box-btn softsource-btn-hover-transition">Add Your Story</a>
                            <div class="softsource-add-story-link">
                                <a title="Add with Audio" href="{{ route('story.write', ['type' => 'audio']) }}"><i
                                        class="fa fa-music"></i></a>
                                <a title="Add with Video" href="{{ route('story.write', ['type' => 'audio']) }}"><i
                                        class="fa fa-video"></i></a>
                                <a title="Add Only Text" href="{{ route('story.write', ['type' => 'text']) }}"
                                    class="music"><i class="fa fa-file"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="softsource-partner-details-historychip-div">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                    <img class="img-fluid w-75" src="{{ asset('frontend/images/logo/logo.png') }}" alt="History Chip Logo">
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="softsource-hc-partner-intro">
                        <h2>History Chip</h2>
                        <p>provides a platform for storytellers and readers that expands our understanding of everyday
                            experiences and revolutionizes how we view history.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="softsource-partner-top-section">
        <div class="container">
            <div class="row">
                <div class=" col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="softsource-partner-top-section-intro">
                        <h2>{{ $partner->partner_name }}</h2>
                        <p class="softsource-partner-top-section-short-description softsource-text-justify">
                            {{ $partner->short_description }}
                        </p>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <img class="w-75" src="{{ asset($partner->top_image) }}">
                </div>
            </div>
        </div>
    </div>
    <div class="softsource-partner-bottom-section mb-5">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($partnerimages->partner_image as $key => $image)
                    @if ($key == 3)
                    @break;
                @endif
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <img src="{{ asset($image->image_path) }}" alt="{{ $image->image_alt_text }}"
                        style="width: 75%; height:219px">
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?= $partner->description ?>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($partnerimages->partner_image as $key => $image)
                @if ($key >= 0 && $key <= 2)
                    @continue;
                @endif
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <img src="{{ asset($image->image_path) }}" alt="{{ $image->image_alt_text }}"
                        style="width: 75%; height:219px">
                </div>
            @endforeach
        </div>
    </div>
</div>

@if (!empty($recent_partner_stories))
    <section class="py-5 my-5">
        <div class="row mx-1 px-5">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="softsource-home-fetured-story-section-title-wrap text-center mb-5 ps-5 d-flex">
                    <div class="softsource-home-fetured-story-top-title">Recent &nbsp;{{ $partner->partner_name }}&nbsp; Stories</div>

                </div>
            </div>
        </div>
        <div class="container mt-5">

            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        @foreach ($recent_partner_stories as $key => $story)
                            @php

                                if ($story->header_image_path == '') {
                                    $headerImage = '/storage/frontend/stories/images/Banner72pi2.jpg';
                                } else {
                                    $headerImage = $story->header_image_path;
                                }
                            @endphp
                            <div
                                class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-5 animate__animated fadeInUp">
                                <div class="softsource-story-item-div">
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


@endsection
