@extends('site.layouts.header')

@section('content')
    <style scoped>
        .softsource-top-contianer {
            background-image: url("{{ asset('frontend/images/web_img/about-banner.jpg') }}");
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
    <!--============ about Start ============-->
    <div class="softsource-my-stories-middle-container pb-2 pt-3">
        <div class="container">
            <div class="col-12 mb-5">
                @if (session('success'))
                    <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-success">{{ session('success') }}</h6>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-danger"><i class='bx bxs-message-square-x'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-danger">{{ session('error') }}</h6>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('info'))
                    <div class="alert border-0 border-start border-5 border-info alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-info"><i class='bx bx-info-square'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-info">{{ session('info') }}</h6>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="col-lg-12">
                <div class="text-center  ">
                    <ul class="nav nav-tabs justify-content-center softsource-my-story-tab-wrap" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab_published" role="tab"
                                aria-selected="true">
                                <div class="tab-title">Published Stories</div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab_submitted" role="tab"
                                aria-selected="false">
                                <div class="tab-title">Submitted Stories</div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab_draft" role="tab" aria-selected="false">
                                <div class="tab-title">Drafted Stories</div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab_reject" role="tab"
                                aria-selected="false">
                                <div class="tab-title">Rejected Stories</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content ht-tab__content">
                    <div id="tab_published" class="tab-pane fade active show" role="tabpanel">
                        <div class="tab-history-wrap section-space--mt_40">
                            <h4 class="text-center my-3 ">Published Stories</h4>
                            <div class="row">
                                @if (count($published_stories) > 0)
                                    @foreach ($published_stories as $story)
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
                                                            {{-- @if (substr($story->audio_video_path, -4) == '.mp4' && $story->audioconvert == 0)
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
                                                            @endif --}}
                                                            <audio
                                                                style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%"
                                                                controls controlsList="nodownload">
                                                                <source src="{{ $story->audio_video_path }}">
                                                                Your browser does not support the audio element.
                                                            </audio>
                                                        @endif
                                                    </div>
                                                    <div class="softsource-story-btn-text d-flex justify-content-between">
                                                        <a href="{{ url($story->url) }}">Read more <i
                                                                class="ml-1 button-icon fas fa-long-arrow-right"></i></a>
                                                        <div>

                                                            <a href="{{ route('story.write', $story->id) }}"
                                                                class="btn softsource-round-btn" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title=""
                                                                data-bs-original-title="Edit Story"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <a href="{{ route('story.delete', $story->id) }}"
                                                                class="btn softsource-round-btn" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title=""
                                                                data-bs-original-title="Delete Story"><i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>


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
                                @if (count($published_stories) > 0)
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 text-center mb-5">
                                            <div style="width: 280px;margin: 0 auto;"
                                                class="d-flex justify-content-center pagination">
                                                @csrf
                                                {!! $published_stories->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="tab_submitted" class="tab-pane fade" role="tabpanel">
                        <div class="tab-history-wrap section-space--mt_40">
                            <h4 class="text-center my-3">Submitted Stories waiting for Approval</h4>
                            <div class="row">
                                @if (count($waiting_stories) > 0)
                                    @foreach ($waiting_stories as $story)
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
                                                            alt="{{ $story->header_image_alt_text }}"
                                                            style="width: 370px;">
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
                                                            {{-- @if (substr($story->audio_video_path, -4) == '.mp4' && $story->audioconvert == 0)
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
                                                            @endif --}}
                                                            <audio
                                                                style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%"
                                                                controls controlsList="nodownload">
                                                                <source src="{{ $story->audio_video_path }}">
                                                                Your browser does not support the audio element.
                                                            </audio>
                                                        @endif
                                                    </div>
                                                    <div class="softsource-story-btn-text d-flex justify-content-between">
                                                        <a href="{{ url($story->url) }}">Read more <i
                                                                class="ml-1 button-icon fas fa-long-arrow-right"></i></a>
                                                        <div>

                                                            <a href="{{ route('story.write', $story->id) }}"
                                                                class="btn softsource-round-btn" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title=""
                                                                data-bs-original-title="Edit Story"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <a href="{{ route('story.delete', $story->id) }}"
                                                                class="btn softsource-round-btn" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title=""
                                                                data-bs-original-title="Delete Story"><i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>


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
                                @if (count($waiting_stories) > 0)
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 text-center mb-5">
                                            <div style="width: 280px;margin: 0 auto;"
                                                class="d-flex justify-content-center pagination">
                                                @csrf
                                                {!! $waiting_stories->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="tab_draft" class="tab-pane fade" role="tabpanel">
                        <div class="tab-history-wrap section-space--mt_40">
                            <h4 class="text-center my-3">Drafted Stories</h4>
                            <div class="row">
                                @if (count($draft_stories) > 0)
                                    @foreach ($draft_stories as $story)
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
                                                            alt="{{ $story->header_image_alt_text }}"
                                                            style="width: 370px;">
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
                                                            {{-- @if (substr($story->audio_video_path, -4) == '.mp4' && $story->audioconvert == 0)
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
                                                            @endif --}}
                                                            <audio
                                                                style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%"
                                                                controls controlsList="nodownload">
                                                                <source src="{{ $story->audio_video_path }}">
                                                                Your browser does not support the audio element.
                                                            </audio>
                                                        @endif
                                                    </div>
                                                    <div class="softsource-story-btn-text d-flex justify-content-between">
                                                        <a href="{{ url($story->url) }}">Read more <i
                                                                class="ml-1 button-icon fas fa-long-arrow-right"></i></a>
                                                        <div>

                                                            <a href="{{ route('story.write', $story->id) }}"
                                                                class="btn softsource-round-btn" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title=""
                                                                data-bs-original-title="Edit Story"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <a href="{{ route('story.delete', $story->id) }}"
                                                                class="btn softsource-round-btn" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title=""
                                                                data-bs-original-title="Delete Story"><i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>


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
                                @if (count($draft_stories) > 0)
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 text-center mb-5">
                                            <div style="width: 280px;margin: 0 auto;"
                                                class="d-flex justify-content-center pagination">
                                                @csrf
                                                {!! $draft_stories->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="tab_reject" class="tab-pane fade" role="tabpanel">
                        <div class="tab-history-wrap section-space--mt_40">
                            <h4 class="text-center my-3">Rejected Stories</h4>
                            <div class="row">
                                @if (count($rejected_stories) > 0)
                                    @foreach ($rejected_stories as $story)
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
                                                            alt="{{ $story->header_image_alt_text }}"
                                                            style="width: 370px;">
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
                                                            {{-- @if (substr($story->audio_video_path, -4) == '.mp4' && $story->audioconvert == 0)
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
                                                            @endif --}}

                                                            <audio
                                                                style="width: 96%; height: 40px; margin-left: 2%; margin-right: 2%"
                                                                controls controlsList="nodownload">
                                                                <source src="{{ $story->audio_video_path }}">
                                                                Your browser does not support the audio element.
                                                            </audio>
                                                        @endif
                                                    </div>
                                                    <div class="softsource-story-btn-text d-flex justify-content-between">
                                                        <a href="{{ url($story->url) }}">Read more <i
                                                                class="ml-1 button-icon fas fa-long-arrow-right"></i></a>
                                                        <div>

                                                            <a href="{{ route('story.write', $story->id) }}"
                                                                class="btn softsource-round-btn" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title=""
                                                                data-bs-original-title="Edit Story"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <a href="{{ route('story.delete', $story->id) }}"
                                                                class="btn softsource-round-btn" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title=""
                                                                data-bs-original-title="Delete Story"><i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>


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
                                @if (count($rejected_stories) > 0)
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 text-center mb-5">
                                            <div style="width: 280px;margin: 0 auto;"
                                                class="d-flex justify-content-center pagination">
                                                @csrf
                                                {!! $rejected_stories->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script></script>
@endsection
