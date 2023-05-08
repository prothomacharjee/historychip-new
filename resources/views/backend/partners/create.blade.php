@extends('backend.layouts.header')

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Partner</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Partners</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
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

        <div class="col">
            {{-- <h6 class="mb-0 text-uppercase">Partners</h6>
                <hr /> --}}
            <div class="card">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" method="post" novalidate action="{{ route('admin.partners.store') }}" id="partner_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="partner[id]" id="id" value="{{ old('id') ? old('id') : (!empty($partner->id) ? $partner->id : null) }}" />

                            <div class="col-md-6">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input required minlength="5" maxlength="200" id="name" name="partner[name]" placeholder="Enter A Unique Partner Name Here" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : (!empty($partner->name) ? $partner->name : null) }}">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">You must enter a unique partner name.</div>
                                @error('name')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input required minlength="5" maxlength="200" id="email" name="partner[email]" placeholder="Enter A Partner's Contact Email Here" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ? old('email') : (!empty($partner->email) ? $partner->email : null) }}">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">You must enter a partner's email.</div>
                                @error('email')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="banner" class="form-label">Banner <span class="text-danger">* (Max - 2MB ,
                                        Accepted - Jpg, Png, Svg,
                                        Jpeg, WebP)</span></label>
                                <input class="form-control file-uploader" name="banner" id="banner" type="file" accept=".png,.jpg,.jpeg,.svg, .webp" maxFileSize="2MB" onchange="FileUploaderValidation(this, 2, ['image/png', 'image/jpeg', 'image/svg', 'image/webp'], 'banner', 25)" />
                                <div id="file-error-banner" class="form-text text-danger"></div>
                                @error('banner')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="banner_alt_text" class="form-label">Banner Alt Text <span class="text-danger">*</span></label>
                                <input minlength="3" maxlength="50" id="banner_alt_text" name="partner[banner_alt_text]" placeholder="Enter Banner Alter Text Here" type="text" class="form-control @error('banner_alt_text') is-invalid @enderror" value="{{ old('banner_alt_text') ? old('banner_alt_text') : (!empty($partner->banner_alt_text) ? $partner->banner_alt_text : null) }}">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">You must enter banner alter text Here. Maximum 50
                                    character and Minimum 3 characters allowed.</div>
                                @error('banner_alt_text')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="selected-file-banner">
                                    @if (!empty($partner))
                                    @if (!empty($partner->banner))
                                    <img src="{{ $partner->banner }}" alt="{{ $partner->banner_alt_text }}" class="w-25">
                                    @else
                                    <img src="{{ asset('backend/images/custom/no-image-icon.png') }}" alt="" class="w-25">
                                    @endif
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="partner_type_id" class="form-label">Partner Type <span class="text-danger">*</span></label>
                                <select required name="partner[partner_type_id]" id="partner_type_id" class="form-control">
                                    <option value="">Select Partner Type</option>
                                    @foreach ($partner_types as $partner_type)
                                    <option value="{{ $partner_type->id }}" data-max_image="{{ $partner_type->max_image_count }}" data-max_content_length="{{ $partner_type->max_content_length }}">
                                        {{ $partner_type->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-12">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input required minlength="5" maxlength="200" id="title" name="partner[title]" placeholder="Enter A Title For The Partner Page" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ? old('title') : (!empty($partner->title) ? $partner->title : null) }}">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">You must enter a title for the partner page.</div>
                                @error('name')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-8">
                                <label for="logo" class="form-label">Logo <span class="text-danger">*(Max - 1MB ,
                                        Accepted - Jpg, Png, Svg, Jpeg, WebP)</span></label>
                                <input class="form-control file-uploader" name="logo" id="logo" type="file" accept=".png,.jpg,.jpeg,.svg, .webp" maxFileSize="1MB" onchange="FileUploaderValidation(this, 1, ['image/png', 'image/jpeg', 'image/svg', 'image/webp'], 'logo', 25)" />
                                <div id="file-error-logo" class="form-text text-danger"></div>
                                @error('logo')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4 text-center">
                                <div class="selected-file-logo">
                                    @if (!empty($partner))
                                    @if (!empty($partner->logo))
                                    <img src="{{ $partner->logo }}" alt="{{ $partner->logo }}" class="w-50">
                                    @else
                                    <img src="{{ asset('backend/images/custom/no-image-icon.png') }}" alt="" class="w-25">
                                    @endif
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea minlength="100" maxlength="500" rows="10" class="form-control @error('description') is-invalid @enderror" id="description" name="partner[description]" placeholder="Write Your Description Here" required aria-describedby="validationContentFeedback">{{ old('description') ? old('description') : (!empty($partner->description) ? $partner->description : null) }}</textarea>
                                <div class="text-end partner-description-word-count">0/500</div>
                                <div class="invalid-feedback">You Must Write Partner's Description Here.</div>
                                @error('description')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="partner_image" class="form-label">Images <span class="text-danger">*(Max
                                        - 1MB , Accepted - Jpg, Png, Svg, Jpeg, WebP)</span></label>
                                <input type="file" id="partner_image" name="partner_image[]" multiple class="form-control" accept=".png,.jpg,.jpeg,.svg, .webp" maxFileSize="1MB" max="1" />
                                <div id="file-error-partner-image" class="form-text text-danger"></div>
                                <div class="selected-file-partner-image row"></div>
                                @error('partner_image')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                                @enderror
                            </div>



                            <div class="col-md-12">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="partner[status]" required aria-describedby="validationStatusFeedback">
                                    <option value="1" {{ old('status') == 1 ? 'selected' : (!empty($blog->status) && $blog->status == 1 ? $blog->status : 'selected') }}>
                                        Active</option>
                                    <option value="2" {{ old('status') == 2 ? 'selected' : (!empty($blog->status) && $blog->status == 2 ? $blog->status : '') }}>
                                        Inactive
                                    </option>
                                </select>

                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">You must Select a Status.</div>
                                @error('status')
                                <div id="validationStatusFeedback" class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="mt-5 d-flex align-items-center">
                                <div><i class="bx bxs-meteor me-1 font-22"></i>
                                </div>
                                <h5 class="mb-0">Meta Informations</h5>
                            </div>
                            <hr>

                            <div class="col-md-12">
                                <label for="meta_title" class="form-label">Meta Title <span class="text-danger">*
                                        (Min 30 characters to Max 60 characters allowed)</span></label>
                                <input required minlength="30" maxlength="60" id="meta_title" name="meta[meta_title]" placeholder="Enter A Meta Title Here" type="text" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title') ? old('meta_title') : (!empty($meta->meta_title) ? $meta->meta_title : null) }}">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">You must enter a meta title. Maximum 60 character
                                    and Minimum 30 characters allowed.</div>
                                @error('meta_title')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="meta_description" class="form-label">Meta Description <span class="text-danger">* (Min 50 characters to Max 160 characters
                                        allowed)</span></label>
                                <textarea rows="3" class="form-control @error('meta_description') is-invalid @enderror resize-none" id="meta_description" name="meta[meta_description]" placeholder="Write Your Meta Here" required aria-describedby="validationContentFeedback">{{ old('meta_description') ? old('meta_description') : (!empty($meta->meta_description) ? $meta->meta_description : null) }}</textarea>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">You must enter a meta title. Maximum 160 character and
                                    Minimum 50 characters allowed.</div>
                                @error('blog_title')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="meta_keywords" class="form-label">Meta Keywords <span class="text-danger">* (Max 10 keywords allowed)</span></label>
                                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror tag-input" id="meta_keywords" name="meta[meta_keywords]" placeholder="Enter Meta Keywords" data-role="tagsinput" value="{{ old('meta_keywords') ? old('meta_keywords') : (!empty($meta->meta_keywords) ? $meta->meta_keywords : null) }}">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">You must enter at least 5 keywords.</div>
                                @error('meta_keywords')
                                <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-12">
                                <button class="btn btn-outline-primary" type="submit">Save</button>
                                <button class="btn btn-outline-dark" onclick="saveAsDraft()" type="button">Save as
                                    Draft</button>
                                <button class="btn btn-outline-warning" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>

<script>
    $(document).ready(function() {
        $("#description").summernote({
            placeholder: "Write Your Description Here",
            height: 300,
            fullscreen: true,
        });

        $('#description').on('summernote.keyup', function() {
            let content = $('.note-editable').text();
            let maxLength = $('#description').attr('maxLength');
            let counter = content.length;

            if (counter <= maxLength) {
                $('.partner-description-word-count').text(counter + '/' + maxLength).removeClass('text-danger');
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
    });

    $('#meta_keywords').on('itemAdded', function(event) {
        if ($(this).tagsinput('items').length > 10) {
            $(this).tagsinput('remove', event.item);
        }
    });

    $(document).on('change', '#partner_type_id', function() {

        let selectedOption = $('#partner_type_id option:selected');
        let max_image = selectedOption.data('max_image');
        let max_content_length = selectedOption.data('max_content_length');

        $('#partner_image').attr('max', max_image);
        $('#description').attr('maxlength', max_content_length);
        $('.partner-description-word-count').text(`0/${max_content_length}`);
    })

    // Add event listener for when a file is selected
    $(document).on('change', '#partner_image', function() {
        MultipleFileUploaderValidation(this, 1, ['image/png', 'image/jpeg', 'image/svg', 'image/webp'],
            'partner-image', 100)
    });

    // Add event listener for when an image remove button is clicked
    $(document).on('click', '.softsource-close-button', function() {
        $(this).closest('.col-md-2').remove();
        $('#image').val(''); // Clear selected file
    });
</script>
@endsection
