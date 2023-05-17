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

<div class="softsource-blogs-section pt-5 @if ($detail) softsource-blog-negative-margin @endif">
    <div class="container">
        <div class="row">
            @if (count($stories) > 0)
            @foreach ($stories as $story)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a href="{{ url($story->url) }}" class="d-block softsource-blog-link">
                    <div class="softsource-blog-image-box h-100">
                        <div class="softsource-blog-image">
                            <img class="img-fluid" src="{{ asset($blog->blog_banner) }}" alt="{{ $blog->blog_banner_alt_text }}">
                        </div>
                        <div class="softsource-blog-content">
                            <div class="softsource-blog-meta">
                                <div class="softsource-blog-date">
                                    <span class="far fa-calendar meta-icon"></span>
                                    {{ date('M d Y', strtotime($blog->blog_date)) }}
                                </div>
                            </div>
                            <h6 class="softsource-blog-heading"> {{ $blog->blog_title }}</h6>
                            <div class="softsource-blog-text">
                                {{ strlen(strip_tags($blog->blog_description)) > 60 ? substr(strip_tags($blog->blog_description), 0, 50) . ' . . .' : strip_tags($blog->blog_description) }}
                            </div>
                            <div class="softsource-blog-arrow">
                                <span class="button-text">Read More</span>
                                <i class="fa fa-long-arrow-right ml-1"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
