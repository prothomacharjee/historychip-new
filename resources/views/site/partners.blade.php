@extends('site.layouts.header')

@section('content')


    <style scoped>
        .softsource-top-contianer {
            background-image: url("{{ asset('frontend/images/web_img/mainbg.jpg') }}");
            background-position: center;
            background-size: cover;
        }
    </style>


    <!--============ Resolutions Hero Start ============-->
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
                @if (count($partners) > 0)
                    @foreach ($partners as $partner)
                        <div class="col-lg-4 col-md-6 mb-5">
                            <!--======= Single Partner Item Start ========-->
                            <div class="softsource-partner-item-div">
                                <!-- Partner Feature Start -->
                                <div class="text-center softsource-partner-feature">
                                    <a href="{{ url($partner->url) }}">
                                        <img class="" src="{{ asset($partner->banner) }}"
                                            alt="{{ $partner->banner_alt_text }}">
                                    </a>
                                </div>
                                <!-- Partner Feature End -->

                                <!-- Partner info Start -->
                                <div class="softsource-partner-info">

                                    <div class="softsource-partner-hr"></div>
                                    <h5 class="softsource-partner-title pt-3">
                                        <a href="{{ url($partner->url) }}">{{ mb_strimwidth(strip_tags($partner->title), 0, 50, "...") }}</a>
                                    </h5>
                                    <div class="text-break mt-5">
                                        <p>{{ mb_strimwidth(strip_tags($partner->description), 0, 25, '...') }}</p>
                                    </div>
                                    <div class="softsource-partner-read-more-btn">
                                        <a href="{{ url($partner->url) }}">Read more
                                            <i class="ml-1 button-icon fas fa-long-arrow-right"></i></a>
                                    </div>

                                </div>
                                <!-- Partner info End -->
                            </div>
                            <!--===== Single Partner Item End =========-->
                        </div>
                    @endforeach
                @endif
            </div>


        </div>
    </div>
@endsection
