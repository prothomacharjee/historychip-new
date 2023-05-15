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
                            <label for="photo_credit" class="form-label">Photo Credit <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('photo_credit') is-invalid @enderror"
                                id="photo_credit" name="photo_credit" placeholder="Photo Credit"
                                aria-describedby="validationPhotoCreditFeedback"
                                value="{{ old('photo_credit') ? old('photo_credit') : (!empty($story->photo_credit) ? $story->photo_credit : null) }}">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must enter an photo credit.</div>
                            @error('photo_credit')
                                <div id="validationPhotoCreditFeedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-4">

                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="Title" aria-describedby="validationTitleFeedback"
                                value="{{ old('title') ? old('title') : (!empty($story->title) ? $story->title : null) }}"
                                required>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must enter an title.</div>
                            @error('title')
                                <div id="validationTitleFeedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">

                            <label for="author_name" class="form-label">A Story by <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('author_name') is-invalid @enderror"
                                id="author_name" name="author_name" placeholder="Author Name"
                                aria-describedby="validationauthor_nameFeedback"
                                value="{{ old('author_name') ? old('author_name') : (!empty($story->author_name) ? $story->author_name : Auth::user()->name) }}"
                                required>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must enter an author name.</div>
                            @error('author_name')
                                <div id="validationauthor_nameFeedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror


                        </div>

                        <div class="col-md-4">
                            <label for="tags" class="form-label">Stiry Tags (Max 15 tags allowed)</label>
                            <input type="text"
                                class="form-control @error('tags') is-invalid @enderror softsource-tag-input" id="tags"
                                name="tags" placeholder="Enter Meta Keywords" data-role="tagsinput"
                                value="{{ old('tags') ? old('tags') : (!empty($story->tags) ? $story->tags : null) }}">
                            <span class="fa fa-question-circle field-icon" data-bs-toggle="popover"
                                data-bs-placement="top" data-bs-trigger="hover"
                                data-bs-content="Please add up to 8 tags that best represent your story. Tags will help others as they search
                                                              for stories about similar topics. Tags might include names of people included in your story,
                                                              specific places, events, or key items in your story."></span>
                            <div class="valid-feedback">Looks good!</div>
                            {{-- <div class="invalid-feedback">You must enter at least 5 keywords.</div> --}}
                            @error('tags')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        @php
                            $category_id = old('category_id') ? old('category_id') : (!empty($story->category_id) ? $story->category_id : null);
                            $sub_category_id_level_1 = old('sub_category_id_level_1') ? old('sub_category_id_level_1') : (!empty($story->sub_category_id_level_1) ? $story->sub_category_id_level_1 : null);
                            $sub_category_id_level_2 = old('sub_category_id_level_2') ? old('sub_category_id_level_2') : (!empty($story->sub_category_id_level_2) ? $story->sub_category_id_level_2 : null);
                            $sub_category_id_level_3 = old('sub_category_id_level_3') ? old('sub_category_id_level_3') : (!empty($story->sub_category_id_level_3) ? $story->sub_category_id_level_3 : null);
                        @endphp

                        <div class="col-md-3">
                            <label class="form-label">Category <span class="text-danger">* (Max 3)</span></label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id[]"
                                multiple id='category_id' required>
                                <option value="">Please Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ in_array($category['id'], $category_id) ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must seelct at least one Category. Max 3</div>

                            @error('category_id')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Level 1 Sub Category</label>
                            <select class="form-control @error('sub_category_id_level_1') is-invalid @enderror"
                                name="sub_category_id_level_1[]" multiple id='sub_category_id_level_1'
                                {{ !empty($sub_category_id_level_1) ? '' : 'disabled' }}>
                                
                                @if (!empty($sub_category_id_level_1))
                                    <option value="">Please Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ in_array($category['id'], $category_id) ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must seelct at least one Category. Max 3</div>

                            @error('sub_category_id_level_1')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>



                </form>
            </div> <!-- / .container -->

        </div>
    </div>

    <script>
        $(document).ready(function() {
            // $("#blog_description").summernote({
            //     placeholder: "Write Your Blog Content Here",
            //     height: 300,
            //     fullscreen: true,
            // });

            $('#category_id,#sub_category_id_level_1,#sub_category_id_level_2,#sub_category_id_level_3').select2({
                maximumSelectionLength: 3
            });
        });

        $('#tags').on('itemAdded', function(event) {
            if ($(this).tagsinput('items').length > 15) {
                $(this).tagsinput('remove', event.item);
            }
        });

        function saveAsDraft() {
            $('#is_draft').val('1');
            $('#blog_form').submit();
        }
    </script>
@endsection
