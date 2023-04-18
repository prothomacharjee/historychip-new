@extends('backend.layouts.header')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Notice Prompt</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Notice Prompts</li>
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
                {{-- <h6 class="mb-0 text-uppercase">Notice Prompts</h6>
                <hr /> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" novalidate action="{{ route('notice-prompts.store') }}"
                                method="post">
                                @csrf
                                <input type="hidden" name="id" id="id" value="" />
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="A name for uniquely identify" required
                                        aria-describedby="validationNameFeedback" value="{{ old('name') }}">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must enter an unique name.</div>
                                    @error('name')
                                        <div id="validationNameFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="content" class="form-label">Content <span
                                            class="text-danger">*</span></label>
                                    <textarea minlength="3" maxlength="191" rows="10" class="form-control @error('content') is-invalid @enderror"
                                        id="content" name="content" placeholder="Write your Content here" required
                                        aria-describedby="validationContentFeedback">{{ old('content') }}</textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must enter a notice content. Maximum 191 character and
                                        Minimum 3 characters allowed</div>
                                    @error('content')
                                        <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Start Date & Time</label>
                                    <input class="result form-control date-time-material" type="text" id="duration_from"
                                        name="duration_from" placeholder="Start Date & Time"
                                        value="{{ old('duration_from') }}">

                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">End Date & Time</label>
                                    <input class="result form-control date-time-material" type="text" id="duration_to"
                                        name="duration_to" placeholder="End Date & Time" value="{{ old('duration_to') }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="status" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status" required aria-describedby="validationStatusFeedback">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Inactive
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
                {{-- <h6 class="mb-0 text-uppercase">Notice Prompts List</h6>
                <hr /> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-4 border rounded">
                            <table id="dt_notice_prompt" class="table table-striped table-bordered data-tables"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Content</th>
                                        <th>Start Date & Time</th>
                                        <th>End Date & Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Content</th>
                                        <th>Start Date & Time</th>
                                        <th>End Date & Time</th>
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
            //Notice Prompts
            $("#dt_notice_prompt").DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('notice-prompts.loadDataTable') }}",
                "columns": [{
                        "data": "name"
                    },
                    {
                        "data": "content"
                    },
                    {
                        "data": "duration_from"
                    },
                    {
                        "data": "duration_to"
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
                url: `{{ route('notice-prompts.fetch') }}`,
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                type: 'post',
                dataType: 'json',
                success: function(response) {

                    $("#id").val(response.id);
                    $("#name").val(response.name);
                    $("#content").val(response.content);
                    // $('.summernote').summernote('code', response.content);
                    $("#duration_from").val((response.duration_from) ? moment(response.duration_from).format(
                        'YYYY-MM-DD HH:mm') : '');
                    $("#duration_to").val((response.duration_from) ? moment(response.duration_to).format(
                        'YYYY-MM-DD HH:mm') : '');
                    $("#status").val(response.status);
                    $('#content').summernote();
                    $('.note-icon-caret').hide();
                }
            });
        }
    </script>
@endsection
