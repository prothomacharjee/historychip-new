@extends('site.layouts.header')

@section('content')

    <!--============ Resolutions Hero Start ============-->
    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ms-auto me-auto">
                    <div class="position-relative">
                        <div class="text-center softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text">{{ $page_title }}</h1>
                            @if ($detail)
                                <p class="text-white mb-0 softsoutce-top-banner-paragraph">
                                    <span class="far fa-calendar meta-icon"></span>
                                    {{ date('M d Y', strtotime($blogs->blog_date)) }}
                                </p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="softsource-blogs-section pt-5 @if ($detail) softsource-blog-negative-margin @endif">
        <div class="container">
            @if ($detail)
                <div class="row">
                    <div class="col-lg-8 justify-content-center m-auto">
                        <!-- Post Feature Start -->
                        <div class="softsource-blog-detail-banner text-center">
                            <img class="img-fluid" src="{{ asset($blogs->blog_banner) }}"
                                alt="{{ $blogs->blog_banner_alt_text }}">
                        </div>
                        <!-- Post Feature End -->
                    </div>
                    <div class="col-lg-8 me-auto ms-auto">
                        <div class="softsource-blog-detail-wrap">
                            <!--======= Single Blog Item Start ========-->
                            <div class="">
                                <!-- Post info Start -->
                                <div class="softsource-blog-detail-info mt-3">
                                    <div class="softsource-blog-detail-meta mt-3 justify-content-center"></div>
                                    <div class="softsource-blog-detail-excerpt">
                                        @php
                                            $editor = preg_replace('/font-family.+?;/', '', $blogs->blog_description);
                                            echo $editor;
                                        @endphp
                                    </div>

                                </div>
                                <!-- Post info End -->
                            </div>
                            <!--===== Single Blog Item End =========-->

                        </div>
                    </div>
                </div>

                @if (count($previous) > 0 or count($next) > 0)
                    <div class="row softsource-blognext">
                        <div class="col-lg-8 ms-auto me-auto py-3">
                            <div class="row justify-content-between">
                                <div class="col-12 col-md-auto text-center">
                                    @if ($previous and count($previous) > 0)
                                        <a href="{{ url('blogs/' . $previous[0]->url) }}"><i class="fa fa-arrow-left"></i>
                                            Previous Blog</a>
                                    @endif
                                </div>
                                @if ($next and count($next) > 0)
                                    <div class="col-12 col-md-auto text-center">
                                        <a href="{{ url('blogs/' . $next[0]->url) }}">Next Blog <i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="row">
                    @if (count($blogs) > 0)
                        @foreach ($blogs as $blog)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <a href="{{ url($blog->url) }}" class="d-block softsource-blog-link">
                                    <div class="softsource-blog-image-box h-100">
                                        <div class="softsource-blog-image">
                                            <img class="img-fluid" src="{{ asset($blog->blog_banner) }}"
                                                alt="{{ $blog->blog_banner_alt_text }}">
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
                @if (count($blogs) > 0)
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                            <div style="width: 280px;margin: 0 auto;" class="d-flex justify-content-center pagination">
                                @csrf
                                {!! $blogs->links() !!}
                            </div>
                        </div>
                    </div>
                @endif


            @endif

        </div>
    </div>
@endsection
