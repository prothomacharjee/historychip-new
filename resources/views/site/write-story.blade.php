@extends('site.layouts.header')

@section('content')
    @php
        $preload = '';
    @endphp



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

    <div class="softsource-write-story-submit-section pt-3">
        <div class="container">
            <div class="container softsource-write-story-col-container my-5">
                <div class="text-center softsource-tab-buttons">
                    <button type="button" id="text"
                        class="softsource-write-story-btn my-2 px-4 softsource-show-action softsource-only-text">Only
                        Text</button>
                    <button type="button" id="audio"
                        class="softsource-write-story-btn my-2 px-4 softsource-show-action softsource-only-audio">Only
                        Audio/Video</button>
                    <button type="button"
                        class="softsource-write-story-btn my-2 px-4 softsource-show-action softsource-audio-text active">Both</button>
                </div>
                <form method="POST" name="submitStory" id="submitstory" action="javascript:;"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row pt-3">
                        <div class="col-12">
                            <div class="form-group form-md-floating-label image-upload-banner">
                                <input type="file" id="story_header_image" name="story_header_image"
                                    data-id="{{ route('story.deleteimage') }}"
                                    data-fileuploader-files='{{ json_encode($preload) }}'
                                    data-url="{{ route('story.saveimage') }}" data-name="story">
                                <!--<span class="help-block">Entering a photograph here is optional but will help to introduce and draw attention to your story. <br> <span class="required">*</span> Note: Photograph should be under 10 MB and Allowed Formats : "JPG", "PNG", "GIF", "JPEG","JFIF"</span>-->
                                <div id="errorBlock" class="help-block"></div>
                            </div>
                            <input type="hidden" name="header_image_path" id="header_image_path" class="front_file-saver"
                                value="">
                        </div>

                        <div class="col-12 photo_credit_div" style="display:none">
                            <label for="photo_credit" class="form-label">Photo Credit <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('photo_credit') is-invalid @enderror" id="photo_credit"
                                name="photo_credit" placeholder="Photo Credit"
                                aria-describedby="validationPhotoCreditFeedback" value="{{ old('photo_credit') }}">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must enter an photo credit.</div>
                            @error('photo_credit')
                                <div id="validationPhotoCreditFeedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-4">

                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="Title"
                                aria-describedby="validationTitleFeedback" value="{{ old('title') }}">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must enter an title.</div>
                            @error('title')
                                <div id="validationTitleFeedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">

                            <label for="author_name" class="form-label">A Story by <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('author_name') is-invalid @enderror" id="author_name"
                                name="author_name" placeholder="Author Name"
                                aria-describedby="validationauthor_nameFeedback" value="{{ Auth::user()->name }}">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must enter an author name.</div>
                            @error('author_name')
                                <div id="validationauthor_nameFeedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror


                        </div>


                </form>
            </div> <!-- / .container -->

        </div>
    </div>
@endsection
