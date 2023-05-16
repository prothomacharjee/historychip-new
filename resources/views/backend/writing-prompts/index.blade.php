@extends('backend.layouts.header')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Writing Prompt</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Writing Prompts</li>
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
                                {{-- <div>{{ session('success') }}</div> --}}
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
                                {{-- <div>{{ session('error') }}</div> --}}
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
                {{-- <h6 class="mb-0 text-uppercase">writing Prompts</h6>
                <hr /> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" novalidate action="{{ route('admin.writing-prompts.store') }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="id" value="" />
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" placeholder="A name for uniquely identify" required
                                        aria-describedby="validationNameFeedback" value="{{ old('title') }}">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must enter an unique title.</div>
                                    @error('title')
                                        <div id="validationNameFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="details" class="form-label">Details <span
                                            class="text-danger">*</span></label>
                                    <textarea rows="10" class="form-control softsource-summernote @error('details') is-invalid @enderror" id="details"
                                        name="details" placeholder="Write your details here" required aria-describedby="validationContentFeedback">{{ old('details') }}</textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must enter details.</div>
                                    @error('details')
                                        <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-10">
                                    <label for="icon" class="form-label">Icon (Max - 1MB , Accepted - Jpg, Png, Svg,
                                        Jpeg, WebP) </label>
                                    <input class="form-control file-uploader" name="icon" id="icon" type="file"
                                        accept=".png,.jpg,.jpeg,.svg, .webp" maxFileSize="1MB"
                                        onchange="FileUploaderValidation(this, 1, ['image/png', 'image/jpeg', 'image/svg', 'image/webp'], 'icon')" />
                                    <div id="file-error-icon" class="form-text text-danger"></div>
                                    @error('icon')
                                        <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2 text-center">
                                    <div class="selected-file-icon"></div>
                                </div>

                                <div class="col-md-12">
                                    <label for="status" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status" required aria-describedby="validationStatusFeedback">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="2" {{ old('status') == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must Select a Status.</div>
                                    @error('status')
                                        <div id="validationStatusFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-outline-primary" type="submit">Submit</button>
                                    <button class="btn btn-outline-warning" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col">
                {{-- <h6 class="mb-0 text-uppercase">writing Prompts List</h6>
                <hr /> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-4 border rounded">
                            <table id="dt_writing_prompt" class="table table-striped table-bordered data-tables"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Details</th>
                                        <th>Icon</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Details</th>
                                        <th>Icon</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>

    <script>
        $(document).ready(function() {
            //writing Prompts
            $("#dt_writing_prompt").DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.writing-prompts.loadDataTable') }}",
                "columns": [{
                        "data": "serial"
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "details"
                    },
                    {
                        "data": "icon",
                        orderable: false,
                        searchable: false
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "action",
                        orderable: false,
                        searchable: false
                    }
                ]
            });




        });


        function editFunc(id) {
            $.ajax({
                url: `{{ route('admin.writing-prompts.fetch') }}`,
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                type: 'post',
                dataType: 'json',
                success: function(response) {

                    $("#id").val(response.id);
                    $("#title").val(response.title);
                    $("#details").val(response.details);
                    $('.softsource-summernote').summernote('code', response.details);
                    $("#status").val(response.status);
                    let img = (response.icon) ? `<img src="${response.icon}" alt="${response.title}" class="w-50">` : `<img src="{{ asset('backend/images/custom/no-image-icon.png') }}" alt="${response.title}" class="w-75">`;
                    $(".selected-file").html(img);
                }
            });
        }
    </script>
@endsection
