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
                            <label for="tags" class="form-label">Story Tags (Max 15 tags allowed)</label>
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
                            $category_id = old('category_id') ? old('category_id') : (!empty($story->category_id) ? $story->category_id : []);
                            $sub_category_id_level_1 = old('sub_category_id_level_1') ? old('sub_category_id_level_1') : (!empty($story->sub_category_id_level_1) ? $story->sub_category_id_level_1 : []);
                            $sub_category_id_level_2 = old('sub_category_id_level_2') ? old('sub_category_id_level_2') : (!empty($story->sub_category_id_level_2) ? $story->sub_category_id_level_2 : []);
                            $sub_category_id_level_3 = old('sub_category_id_level_3') ? old('sub_category_id_level_3') : (!empty($story->sub_category_id_level_3) ? $story->sub_category_id_level_3 : []);
                        @endphp

                        <div class="col-md-3 mt-3">
                            <label class="form-label">Category <span class="text-danger">* (Max 3)</span></label>
                            <select class="form-control @error('category_id') is-invalid @enderror story-category-select2 " name="category_id[]"
                                multiple id='category_id' required>
                                <option value="">Please Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ in_array($category->id, $category_id) ? 'selected' : '' }}>
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
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Level 1 Sub Category</label>
                            <select class="form-control @error('sub_category_id_level_1') is-invalid @enderror story-category-select2"
                                name="sub_category_id_level_1[]" multiple id='sub_category_id_level_1'
                                {{ !empty($sub_category_id_level_1) ? '' : 'disabled' }}>

                                @if (!empty($sub_category_id_level_1))
                                    <option value="">Please Select</option>
                                    @foreach ($categories_level1 as $category_level1)
                                        <option value="{{ $category_level1->id }}"
                                            {{ in_array($category_level1->id, $sub_category_id_level_1) ? 'selected' : '' }}>
                                            {{ $category_level1->name }}</option>
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

                        <div class="col-md-3 mt-3">
                            <label class="form-label">Level 2 Sub Category</label>
                            <select class="form-control @error('sub_category_id_level_2') is-invalid @enderror story-category-select2"
                                name="sub_category_id_level_2[]" multiple id='sub_category_id_level_2'
                                {{ !empty($sub_category_id_level_2) ? '' : 'disabled' }}>

                                @if (!empty($sub_category_id_level_2))
                                    <option value="">Please Select</option>
                                    @foreach ($categories_level2 as $category_level2)
                                        <option value="{{ $category_level2->id }}"
                                            {{ in_array($category_level2->id, $sub_category_id_level_2) ? 'selected' : '' }}>
                                            {{ $category_level2->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must seelct at least one Category. Max 3</div>

                            @error('sub_category_id_level_2')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label">Level 3 Sub Category</label>
                            <select class="form-control @error('sub_category_id_level_3') is-invalid @enderror story-category-select2"
                                name="sub_category_id_level_3[]" multiple id='sub_category_id_level_3'
                                {{ !empty($sub_category_id_level_3) ? '' : 'disabled' }}>

                                @if (!empty($sub_category_id_level_3))
                                    <option value="">Please Select</option>
                                    @foreach ($categories_level3 as $category_level3)
                                        <option value="{{ $category_level3->id }}"
                                            {{ in_array($category_level3->id, $sub_category_id_level_3) ? 'selected' : '' }}>
                                            {{ $category_level3->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must seelct at least one Category. Max 3</div>

                            @error('sub_category_id_level_3')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-3">
                            <input id="anonymous" type="checkbox" name="anonymous" value="1" defaultValue="0">
                            <label for="name">
                                <h6>Tag this story as Anonymous</h6>
                            </label>
                        </div>

                        {{-- <div class="col-md-8 show-text">
                            <label>
                                <h6>Content</h6>
                            </label>
                            <textarea id="context" class="form-input w-100 softsource-summernote" name="context" rows="16"
                                required="true" placeholder="Tell the world your story..."><?php echo $context; ?></textarea>
                            <span id="maxContentPost"></span>
                        </div>
                        <div class="col-md-4 show-audio">
                            <label>
                                <h6>Audio/Video</h6>
                            </label>

                            <label><input <?php if ($audioconvert == 1) {
                                echo 'checked';
                            } ?> class="form-check-input" type="checkbox"
                                    id="audioconvertcheck">Keep Audio Only for a Video File (Video File
                                will converted to audio).</label>
                            <!-- Star -->
                            <div class="form-group form-row align-items-center">
                                <div class="col-md-12">
                                    <label>Audio/Video Credit <span class="avcreditRequired required">*</span>:</label>
                                    <input id="photo-credit" type="text" class="form-input form-control"
                                        {{ $errors->has('avcredit') ? ' is-invalid' : '' }}" name="avcredit"
                                        value="<?php echo $avcredit; ?>" required
                                        placeholder="Audio/Video Credit (Required if Uploaded)">


                                    @if ($errors->has('avcredit'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('avcredit') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- End -->
                            <input type="file" name="audio_file_front"
                                data-id="{{ url('submitastory/delete_audio') }}"
                                data-fileuploader-files='<?php echo json_encode($audio_preload); ?>'
                                data-url="{{ url('submitastory/save_audio') }}" data-name="story">
                            <div id="errorBlock" class="help-block"></div>
                            <input type="hidden" name="audio_file" class="file-saver" value="<?php echo $audio_path; ?>">

                            <input type="hidden" name="audioconvert" id="audioconvert" class="audioconvert"
                                value="<?php echo $audioconvert; ?>">

                        </div> --}}



                </form>
            </div> <!-- / .container -->

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.story-category-select2').select2({
                maximumSelectionLength: 3,
                placeholder: "Please Select"
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

        $('#description').on('summernote.keyup', function() {
            let content = $('.note-editable').text();
            let maxLength = $('#description').attr('maxLength');
            let counter = content.length;

            if (counter <= maxLength) {
                $('.partner-description-word-count').text(counter + '/' + maxLength).removeClass(
                    'text-danger');
            } else {
                var newtext = content.substring(0, content.length - 1);
                $('.partner-description-word-count').addClass('text-danger');
                $('.note-editable').text(newtext);
                // Move the cursor to the end of the div
                let selector = document.getElementsByClassName('note-editable')[0];
                var range = document.createRange();
                range.selectNodeContents(selector);
                range.collapse(false);
                var sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
            }
        })
    </script>
@endsection
