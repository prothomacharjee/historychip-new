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
            </div>
        </div>
    </div>

    <div class="softsource-partner-details-historychip-div">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-3 col-lg-3 text-center">
                    <img class="img-fluid w-75" src="{{ asset('frontend/images/logo/logo.png') }}" alt="History Chip Logo">
                </div>
                <div class="col-xl-8 col-lg-8">
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
                <div class="col-xl-6 col-lg-6">
                    <div class="softsource-partner-top-section-intro">
                        <h2>{{ $partner->partner_name }}</h2>
                        <p class="softsource-partner-top-section-short-description softsource-text-justify">
                            {{ $partner->short_description }}
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
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
                <div class="col-md-4">
                    <img src="{{ asset($image->image_path) }}" alt="{{ $image->image_alt_text }}"
                        style="width: 75%; height:219px">
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <?= $partner->description ?>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($partnerimages->partner_image as $key => $image)
                @if ($key >= 0 && $key <= 2)
                    @continue;
                @endif
                <div class="col-md-4">
                    <img src="{{ asset($image->image_path) }}" alt="{{ $image->image_alt_text }}"
                        style="width: 75%; height:219px">
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
