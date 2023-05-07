@extends('backend.layouts.header')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blog</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
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
                {{-- <h6 class="mb-0 text-uppercase">Notice Prompts</h6>
                <hr /> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" method="post" novalidate
                                action="{{ route('admin.blogs.store') }}" id="blog_form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="blog[id]" id="id"
                                    value="{{ old('id') ? old('id') : (!empty($blog->id) ? $blog->id : null) }}" />


                                <input type="hidden" name="blog[is_draft]" id="is_draft" value="0">

                                <div class="col-md-8">
                                    <label for="blog_title" class="form-label">Title <span class="text-danger">* (Min 5
                                            characters to Max 200 characters allowed)</span></label>
                                    <input required minlength="5" maxlength="200" id="blog_title" name="blog[blog_title]"
                                        placeholder="Enter A Unique Blog Title Here" type="text"
                                        class="form-control @error('blog_title') is-invalid @enderror"
                                        value="{{ old('blog_title') ? old('blog_title') : (!empty($blog->blog_title) ? $blog->blog_title : null) }}">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must enter a unique blog title. Maximum 200 character
                                        and Minimum 5 characters allowed.</div>
                                    @error('blog_title')
                                        <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="blog_date" class="form-label">Date <span
                                            class="text-danger">*</span></label>
                                    <input required id="blog_date" name="blog[blog_date]" type="text"
                                        class="form-control date-material @error('blog_title') is-invalid @enderror"
                                        value="{{ old('blog_title') ? old('blog_title') : (!empty($blog->blog_date) ? $blog->blog_date : now()->format('Y-m-d')) }}">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must enter a date.</div>
                                    @error('blog_date')
                                        <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="blog_description" class="form-label">Blog Content <span
                                            class="text-danger">*</span></label>
                                    <textarea rows="10" class="form-control @error('blog_description') is-invalid @enderror" id="blog_description"
                                        name="blog[blog_description]" placeholder="Write Your Blog Content Here" required
                                        aria-describedby="validationContentFeedback">{{ old('blog_description') ? old('blog_description') : (!empty($blog->blog_description) ? $blog->blog_description : null) }}</textarea>

                                    <div class="invalid-feedback">You Must Write Your Blog Content Here.</div>
                                    @error('blog_description')
                                        <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="blog_banner" class="form-label">Banner (Max - 2MB , Accepted - Jpg, Png,
                                        Svg,
                                        Jpeg, WebP) </label>
                                    <input class="form-control file-uploader" name="blog_banner" id="blog_banner"
                                        type="file" accept=".png,.jpg,.jpeg,.svg, .webp" maxFileSize="2MB"
                                        onchange="FileUploaderValidation(this, 2, ['image/png', 'image/jpeg', 'image/svg', 'image/webp'], 'banner', 25)" />
                                    <div id="file-error-banner" class="form-text text-danger"></div>
                                    @error('blog_banner')
                                        <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="blog_banner_alt_text" class="form-label">Banner Alt Text</label>
                                    <input minlength="3" maxlength="50" id="blog_banner_alt_text"
                                        name="blog[blog_banner_alt_text]" placeholder="Enter Banner Alter Text Here"
                                        type="text"
                                        class="form-control @error('blog_banner_alt_text') is-invalid @enderror"
                                        value="{{ old('blog_banner_alt_text') ? old('blog_banner_alt_text') : (!empty($blog->blog_banner_alt_text) ? $blog->blog_banner_alt_text : null) }}">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must enter banner alter text Here. Maximum 50
                                        character and Minimum 3 characters allowed.</div>
                                    @error('blog_banner_alt_text')
                                        <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="selected-file-banner">
                                        @if (!empty($blog))
                                            @if (!empty($blog->blog_banner))
                                                <img src="{{ $blog->blog_banner }}"
                                                    alt="{{ $blog->blog_banner_alt_text }}" class="w-25">
                                            @else
                                                <img src="{{ asset('backend/images/custom/no-image-icon.png') }}"
                                                    alt="" class="w-25">
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="blog[status]" required aria-describedby="validationStatusFeedback">
                                        <option value="1"
                                            {{ old('status') == 1 ? 'selected' : (!empty($blog->status) && $blog->status == 1 ? $blog->status : 'selected') }}>
                                            Active</option>
                                        <option value="2"
                                            {{ old('status') == 2 ? 'selected' : (!empty($blog->status) && $blog->status == 2 ? $blog->status : '') }}>
                                            Inactive
                                        </option>
                                    </select>

                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must Select a Status.</div>
                                    @error('status')
                                        <div id="validationStatusFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="is_featured" class="form-label">Featured <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('is_featured') is-invalid @enderror"
                                        id="is_featured" name="blog[is_featured]" required
                                        aria-describedby="validationis_featuredFeedback">
                                        <option value="0"
                                            {{ old('is_featured') == 0 ? 'selected' : (!empty($blog->is_featured) && $blog->is_featured == 2 ? $blog->is_featured : 'selected') }}>
                                            No</option>
                                        <option value="1"
                                            {{ old('is_featured') == 1 ? 'selected' : (!empty($blog->is_featured) && $blog->is_featured == 1 ? $blog->is_featured : '') }}>
                                            Yes</option>
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must Select a Featured.</div>
                                    @error('is_featured')
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
                                    <input required minlength="30" maxlength="60" id="meta_title"
                                        name="meta[meta_title]" placeholder="Enter A Meta Title Here" type="text"
                                        class="form-control @error('meta_title') is-invalid @enderror"
                                        value="{{ old('meta_title') ? old('meta_title') : (!empty($meta->meta_title) ? $meta->meta_title : null) }}">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must enter a meta title. Maximum 60 character
                                        and Minimum 30 characters allowed.</div>
                                    @error('meta_title')
                                        <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="meta_description" class="form-label">Meta Description <span
                                            class="text-danger">* (Min 50 characters to Max 160 characters
                                            allowed)</span></label>
                                    <textarea rows="3" class="form-control @error('meta_description') is-invalid @enderror resize-none"
                                        id="meta_description" name="meta[meta_description]" placeholder="Write Your Meta Here" required
                                        aria-describedby="validationContentFeedback">{{ old('meta_description') ? old('meta_description') : (!empty($meta->meta_description) ? $meta->meta_description : null) }}</textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must enter a meta title. Maximum 160 character and
                                        Minimum 50 characters allowed.</div>
                                    @error('blog_title')
                                        <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="meta_keywords" class="form-label">Meta Keywords <span
                                            class="text-danger">* (Max 10 keywords allowed)</span></label>
                                    <input type="text"
                                        class="form-control @error('meta_keywords') is-invalid @enderror tag-input"
                                        id="meta_keywords" name="meta[meta_keywords]" placeholder="Enter Meta Keywords"
                                        data-role="tagsinput"
                                        value="{{ old('meta_keywords') ? old('meta_keywords') : (!empty($meta->meta_keywords) ? $meta->meta_keywords : null) }}">
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
            $("#blog_description").summernote({
                placeholder: "Write Your Blog Content Here",
                height: 300,
                fullscreen: true,
            });
        });

        $('#meta_keywords').on('itemAdded', function(event) {
            if ($(this).tagsinput('items').length > 10) {
                $(this).tagsinput('remove', event.item);
            }
        });

        function saveAsDraft() {
            $('#is_draft').val('1');
            $('#blog_form').submit();
        }
    </script>
@endsection
