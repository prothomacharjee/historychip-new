@extends('site.layouts.header')

@section('content')


    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ms-auto me-auto">
                    <div class="position-relative">
                        <div class="text-center softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text">{{ $page_title }}</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="softsource-story-section pt-5">
        <div class="container">
            <div class="row">


                @if (count($stories) > 0)
                    @foreach ($stories as $story)
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
                                                    href="{{ url('authors/' . $story->author_id . '-' . Str::slug($story->author_details->name)) }}">{{ $story->author_name }}</a>
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
                                                <video style="width: 96%; height: 100px; margin-left: 2%; margin-right: 2%"
                                                    controls controlsList="nodownload">
                                                    <source src="{{ $story->audio_video_path }}">
                                                    Your browser does not support the audio element.
                                                </video>
                                            @else
                                                <audio style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%"
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
@endsection
