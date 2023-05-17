@extends('site.layouts.header')

@section('content')

<style scoped>
    .softsource-top-contianer {
        background-image: url("{{ asset('frontend/images/web_img/about-banner.jpg') }}");
        background-position: center;
        background-size: cover;
    }
</style>


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

<div class="softsource-blogs-section pt-5">
    <div class="container">
        <div class="row">
            @if (count($stories) > 0)
            @foreach ($stories as $story)
            <div class="col-lg-4 col-md-6 mb-5 animate__animated fadeInUp">
                <div class="softsource-story-item-div">
                    <div class="softsource-story-item-image text-center">
                        <a href="{{ url($story->url) }}">
                            <img class="img-fluid" src="{{ asset($story->header_image_path) }}" alt="{{ $story->header_image_alt_text }}" style="width: 370px;">
                        </a>
                    </div>
                    <div class="softsource-story-item-details">
                        <div class="story-meta">
                            <div class="story-date">
                                <span class="far fa-user meta-icon"></span>
                                @if (!$story->anonymous)
                                <a href="">{{$story->author_name }}</a>
                                @else
                                <a href="#">Anonymous</a>
                                @endif
                            </div>
                        </div>
                        <div class="softsource-h-line"></div>
                        <h5 class="story-title pt-3">
                            <a href="{{ url($story->url) }}">{{ $story->title }}</a>
                        </h5>
                        <div class="story-excerpt mt-3">
                            <p>{{ strlen(strip_tags($story->context)) > 60 ? substr(strip_tags($story->context), 0, 50) . ' . . .' : strip_tags($story->context) }}</p>
                        </div>
                        <div style="width: 100%; height: 33px;">
                        </div>
                        <div class="softsource-story-btn-text">
                            <a href="{{ url($story->url) }}">Read more <i class="ml-1 button-icon far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
