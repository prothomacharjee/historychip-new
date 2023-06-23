@extends('site.layouts.header')

@section('content')
    @php

        $type = isset($_GET['type']) ? $_GET['type'] : null;

        $preload = '';
        $audio_preload = '';
        $category_id = old('category_id') ? old('category_id') : (!empty($story->category_id) ? json_decode($story->category_id) : []);
        $sub_category_id_level_1 = old('sub_category_id_level_1') ? old('sub_category_id_level_1') : (!empty($story->sub_category_id_level_1) ? json_decode($story->sub_category_id_level_1) : []);
        $sub_category_id_level_2 = old('sub_category_id_level_2') ? old('sub_category_id_level_2') : (!empty($story->sub_category_id_level_2) ? json_decode($story->sub_category_id_level_2) : []);
        $sub_category_id_level_3 = old('sub_category_id_level_3') ? old('sub_category_id_level_3') : (!empty($story->sub_category_id_level_3) ? json_decode($story->sub_category_id_level_3) : []);
        $length = old('context') ? strlen(old('context')) : (!empty($partner->context) ? strlen(strip_tags($partner->context)) : 0);
        // $max_story_content_length = '12000';
        // $min_story_content_length = '500';
        $header_image_path = !empty($story->header_image_path) ? $story->header_image_path : '';

        if ($header_image_path != '') {
            $preload = [];

            if (file_exists(realpath('.' . $header_image_path))) {
                $path = preg_replace('/\//', '', $header_image_path, 1);
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $path);
                $preload[] = [
                    'name' => basename($path),
                    'type' => $mime,
                    'size' => filesize($path),
                    'file' => $header_image_path,
                    'local' => $header_image_path,
                    'data' => [
                        'url' => $header_image_path,
                        'thumbnail' => $header_image_path,
                        'readerForce' => true,
                    ],
                ];
            }
        }

        $audio_path = !empty($story->audio_video_path) ? $story->audio_video_path : '';

        if ($audio_path != '') {
            $audio_preload = [];
            if (file_exists(realpath('.' . $audio_path))) {
                $path = preg_replace('/\//', '', $audio_path, 1);
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $path);
                $audio_preload[] = [
                    'name' => basename($path),
                    'type' => $mime,
                    'size' => filesize($path),
                    'file' => $audio_path,
                    'local' => $audio_path,
                    'data' => [
                        'url' => $audio_path,
                        'thumbnail' => $audio_path,
                        'readerForce' => true,
                    ],
                ];
            }
        }
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

    <div class="row">
        <div class="col-12">
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
    </div>

    <div class="softsource-write-story-submit-section pt-3">
        <div class="container">
            <div class="container softsource-write-story-col-container my-5">
                @if (!empty($story) && $story->is_draft == 0)
                    <div class="alert border-0 border-start border-5 border-primary alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-primary"><i class='bx bx-primary-square'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-primary">If you edit your story and submit, it will again go through
                                    the
                                    approval phase by our Admin.</h6>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
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
                <form class="row g-3 needs-validation" method="post" novalidate action="{{ route('story.create') }}"
                    id="story_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id"
                        value="{{ old('id') ? old('id') : (!empty($story->id) ? $story->id : null) }}" />
                    <input type="hidden" name="is_draft" id="is_draft" value="0" />

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
                                value="{{ !empty($story->header_image_path) ? $story->header_image_path : null }}">
                        </div>

                        {{-- <div class="col-6 photo_credit_div mt-3" style="{{empty($story)?'display:none':''}}">
                            <label for="header_image_alt_text" class="form-label">Banner Alter Text <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('header_image_alt_text') is-invalid @enderror"
                                id="header_image_alt_text" name="header_image_alt_text"
                                placeholder="Enter an alternative text for the banenr"
                                aria-describedby="validationPhotoAltCreditFeedback"
                                value="{{ old('header_image_alt_text') ? old('header_image_alt_text') : (!empty($story->header_image_alt_text) ? $story->header_image_alt_text : null) }}">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must enter an alternative text for the banenr.</div>
                            @error('header_image_alt_text')
                                <div id="validationPhotoAltCreditFeedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        <div class="col-12 photo_credit_div mt-3" style="{{empty($story)?'display:none':''}}">
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

                        <div class="col-4 mt-3">

                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                id="title" name="title" placeholder="Title"
                                aria-describedby="validationTitleFeedback"
                                value="{{ old('title') ? old('title') : (!empty($story->title) ? $story->title : null) }}"
                                required>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must enter an title.</div>
                            @error('title')
                                <div id="validationTitleFeedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mt-3">

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

                        <div class="col-md-4 mt-3">
                            <label for="tags" class="form-label">Story Tags (Max 15 tags allowed)</label>
                            <input type="text"
                                class="form-control @error('tags') is-invalid @enderror softsource-tag-input"
                                id="tags" name="tags" placeholder="Enter Story Tags (Press Enter to Add)"
                                data-role="tagsinput"
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

                        <div class="col-md-3 mt-3">
                            <label class="form-label">Category <span class="text-danger">* (Max 3)</span></label>
                            <select class="form-control @error('category_id') is-invalid @enderror story-category-select2 "
                                name="category_id[]" multiple id='category_id' required>
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
                            <select
                                class="form-control @error('sub_category_id_level_1') is-invalid @enderror story-category-select2"
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
                            <select
                                class="form-control @error('sub_category_id_level_2') is-invalid @enderror story-category-select2"
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
                            <select
                                class="form-control @error('sub_category_id_level_3') is-invalid @enderror story-category-select2"
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

                        <div class="col-md-12 mt-3 form-check">
                            <input id="is_anonymous_check" type="checkbox" name="is_anonymous_check" value="0">
                            <input id="is_anonymous" type="hidden" name="is_anonymous" value="0">
                            <label for="is_anonymous" class="form-check-label">
                                <h6>Tag this story as Anonymous</h6>
                            </label>
                        </div>

                        <div class="col-md-8 mt-3 softsource-show-text">
                            <label for="context" class="form-label">Story Content</label>
                            <textarea rows="16" class="form-control softsource-summernote @error('context') is-invalid @enderror"
                                id="context" name="context" placeholder="Tell the world your story..." required
                                aria-describedby="validationContentFeedback">{{ old('context') ? old('context') : (!empty($story->context) ? $story->context : null) }}</textarea>
                            <div class="text-end story-context-word-count">
                                {{ $length }} Characters</div>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You Must Write Your Story Content Here.</div>
                            @error('context')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4 row mt-3 softsource-show-audio">

                            <div class="col-md-12">
                                <label for="" class="form-label">Audio/Video</label>
                                <input type="file" name="story_audio_video" id="story_audio_video"
                                    data-id="{{ route('story.deleteaudio') }}"
                                    data-fileuploader-files='{{ json_encode($audio_preload) }}'
                                    data-url="{{ route('story.saveaudio') }}" data-name="story">
                                <div id="errorBlock" class="help-block"></div>
                                <span class="text-danger audio-upload-error-show"></span>
                                <input type="hidden" name="audio_video_path" id="audio_video_path"
                                    class="front_file-saver"
                                    value="{{ !empty($story->audio_video_path) ? $story->audio_video_path : null }}">
                            </div>

                            <div class="col-md-12 audioconvert_div" style="display:none">
                                <div class="form-check d-flex">
                                    <input type="checkbox" id="is_audioconvert_check" name="is_audioconvert_check"
                                        value="0">
                                    <input type="hidden" id="is_audioconvert" name="is_audioconvert" value="0">
                                    <label class="form-check-label" style="font-size: 10pt" for="is_audioconvert">Keep
                                        Audio Only for a Video File (Video File will converted to audio).</label>
                                </div>
                            </div>

                            <div class="col-12 audio_video_credit_div" style="display:none">
                                <label for="audio_video_credit" class="form-label">Audio/Video Credit <span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('audio_video_credit') is-invalid @enderror"
                                    id="audio_video_credit" name="audio_video_credit" placeholder="Audio/Video Credit"
                                    aria-describedby="validationPhotoCreditFeedback"
                                    value="{{ old('audio_video_credit') ? old('audio_video_credit') : (!empty($story->audio_video_credit) ? $story->audio_video_credit : null) }}">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">You must enter an photo credit.</div>
                                @error('audio_video_credit')
                                    <div id="validationPhotoCreditFeedback" class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for="event_location" class="form-label">Event Location <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('event_location') is-invalid @enderror"
                                id="event_location" name="event_location" placeholder="Event Location" required
                                aria-describedby="validationEventLocationFeedback"
                                value="{{ old('event_location') ? old('event_location') : (!empty($story->event_location) ? $story->event_location : null) }}">
                            <span class="fa fa-question-circle field-icon" data-bs-toggle="popover"
                                data-bs-placement="top" data-bs-trigger="hover"
                                data-bs-content="Please be as specific as you are able. If you know the city and state where this story
                                                      happened, please enter that (Austin, Texas, U.S.A.). If you only know the city or state and
                                                      country enter that, (Johannesburg, South Africa). If you only know the country where this story
                                                      happened, please enter the country (Japan)."></span>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must enter an event location.</div>
                            @error('event_location')
                                <div id="validationEventLocationFeedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for="event_detail_dates" class="form-label">Event Period/Instance</label>
                            <input required type="text" class="form-control @error('event_detail_dates') is-invalid @enderror"
                                id="event_detail_dates" name="event_detail_dates" placeholder="Event Period/Instance"
                                required aria-describedby="validationEventDetailsDateFeedback"
                                value="{{ old('event_detail_dates') ? old('event_detail_dates') : (!empty($story->event_detail_dates) ? $story->event_detail_dates : null) }}">
                            <span class="fa fa-question-circle field-icon" data-bs-toggle="popover"
                                data-bs-placement="top" data-bs-trigger="hover"
                                data-bs-content="If your story spans a period of time, be as specific as possible, for instance, Spring 2004, 1960s, 2001-2003. You can either write any one between 'Event Period' and 'Event Date' or both."></span>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">You must enter an event period or instances.</div>
                            @error('event_detail_dates')
                                <div id="validationEventDetailsDateFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for="event_dates" class="form-label">Event Date</label>
                            <input required type="date" class="form-control @error('event_dates') is-invalid @enderror"
                                id="event_dates" name="event_dates" placeholder="Event Date"
                                aria-describedby="validationEventDateFeedback"
                                value="{{ old('event_dates') ? old('event_dates') : (!empty($story->event_dates) ? $story->event_dates : null) }}">
                            <span class="fa fa-question-circle field-icon" data-bs-toggle="popover"
                                data-bs-placement="top" data-bs-trigger="hover"
                                data-bs-content="If you know the exact date for your story add it here. You can either write any one between 'Event Period' and 'Event Date' or both."></span>
                            <div class="valid-feedback">Looks good!</div>
                            {{-- <div class="invalid-feedback">You must enter an event location.</div> --}}
                            @error('event_dates')
                                <div id="validationEventDateFeedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-5 softsource-tab-buttons">
                            <button class="softsource-write-story-btn" type="submit">Submit</button>
                            <button class="softsource-write-story-btn" onclick="saveAsDraft()" type="button">Save as
                                Draft</button>
                            {{-- <button class="softsource-write-story-btn" type="reset">Reset</button> --}}
                            {{-- <button class="softsource-write-story-btn" type="button">Preview</button> --}}
                        </div>

                        <div class="col-md-6 mt-5 softsource-tab-buttons text-end">
                            <a href="{{ route('my-stories') }}" class="softsource-write-story-btn">My Stories<i
                                    class="fa fa-angle-right"></i></a>

                        </div>



                </form>
            </div> <!-- / .container -->

        </div>
    </div>

    <style scoped>
        #event_dates::-webkit-calendar-picker-indicator {
            display: none;
        }
    </style>

    <script>
        $(document).ready(function() {
            let type = '{{ $type }}';
            if (type) {
                $(`#${type}`).trigger("click");
            }

            $('.story-category-select2').select2({
                maximumSelectionLength: 3,
                placeholder: "Please Select",
            });

            $("#context").summernote({
                placeholder: "Tell the world your story...",
                height: 530,
                fullscreen: true,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['color', []],
                    ['insert', ['picture']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['fontsize', ['fontsize']],
                    ['link', ['link']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                callbacks: {
                    onKeydown: function(e) {
                        //     var t = e.currentTarget.innerText;
                        //  {{--    if (t.trim().length >= Number('{{ $max_story_content_length }}')) { --}}
                        //         //delete keys, arrow keys, copy, cut, select all
                        //         if (e.keyCode != 8 && !(e.keyCode >= 37 && e.keyCode <= 40) && e.keyCode !=
                        //             46 && !(e.keyCode == 88 && e.ctrlKey) && !(e.keyCode == 67 && e
                        //                 .ctrlKey) && !(e.keyCode == 65 && e.ctrlKey)) {
                        //             e.preventDefault();
                        //         }
                        //         $('.story-context-word-count').addClass('text-danger');
                        //     }
                    },
                    onKeyup: function(e) {
                        var t = e.currentTarget.innerText;
                        $('.story-context-word-count').text(
                            `${t.length}  Characters`).removeClass(
                            'text-danger');
                    },
                    onPaste: function(e) {
                        var t = e.currentTarget.innerText;
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData)
                            .getData('Text');
                        e.preventDefault();
                        var maxPaste = bufferText.length;
                        //{{-- if(t.length+bufferText.length>Number('$max_story_content_length ')) {
                           // maxPaste = Number('{{ $max_story_content_length }}') - t.length;
                        //} --}}
                        if (maxPaste > 0) {
                            document.execCommand('insertText', false, bufferText.substring(0,
                                maxPaste));
                        }
                        $('.story-context-word-count').text(
                            `${t.length} Characters`).removeClass(
                            'text-danger');
                    }
                }
            });


        });

        $('#tags').on('itemAdded', function(event) {
            if ($(this).tagsinput('items').length > 15) {
                $(this).tagsinput('remove', event.item);
            }
        });


        $(document).on('change', '#is_anonymous_check', function() {
            var valueInput = $(this);
            var hiddenInput = $('#is_anonymous');
            if ($(this).is(":checked")) {
                valueInput.val("1");
                hiddenInput.val("1");
            } else {
                valueInput.val("0");
                hiddenInput.val("0");
            }
        });

        $(document).on('change', '#is_audioconvert_check', function() {
            var valueInput = $(this);
            var hiddenInput = $('#is_audioconvert');
            if ($(this).is(":checked")) {
                valueInput.val("1");
                hiddenInput.val("1");
            } else {
                valueInput.val("0");
                hiddenInput.val("0");
            }
        });



        function saveAsDraft() {
            $('#is_draft').val('1');
            $('#story_form').submit();
        }

        function initAutocomplete() {
            const input = document.getElementById('event_location');
            const autocomplete = new google.maps.places.Autocomplete(input);
        }

        $(document).on('input', '#event_detail_dates', function() {
            toggleRequired($(this), $('#event_dates'));
        });

        $(document).on('input', '#event_dates', function() {
            toggleRequired($(this), $('#event_detail_dates'));
        });

        function toggleRequired(input, otherInput) {
            if (input.val().trim() !== '') {
                otherInput.removeAttr('required');
            } else {
                otherInput.attr('required', 'required');
            }
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUt1OY_N0UIhT8fE6QKlmf5Zs94rCINZ0&libraries=places&callback=initAutocomplete">
    </script>
@endsection
