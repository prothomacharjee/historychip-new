@extends('backend.layouts.header')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Partner Type</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Partner Types</li>
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

            <div class="col-6">
                {{-- <h6 class="mb-0 text-uppercase">Notice Prompts</h6>
                <hr /> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" novalidate
                                action="{{ route('admin.partner-types.store') }}" method="post">
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
                                    <label for="bill" class="form-label">Bill Amount <span
                                            class="text-danger">*</span></label>
                                    <input type="number" step="0.00"
                                        class="form-control @error('bill') is-invalid @enderror" id="bill"
                                        name="bill" placeholder="Enter Bill Amount" required
                                        aria-describedby="validationNameFeedback" value="{{ old('bill') }}">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must enter an unique name.</div>
                                    @error('bill')
                                        <div id="validationNameFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="bill_type" class="form-label">Bill Type <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('bill_type') is-invalid @enderror" id="bill_type"
                                        name="bill_type" required aria-describedby="validationStatusFeedback">
                                        <option value="once" {{ old('bill_type') == 'once' ? 'selected' : '' }}>Once
                                        </option>
                                        <option value="daily" {{ old('bill_type') == 'daily' ? 'selected' : '' }}>Daily
                                        </option>
                                        <option value="monthly" {{ old('bill_type') == 'monthly' ? 'selected' : '' }}>
                                            Monthly</option>
                                        <option value="yearly" {{ old('bill_type') == 'yearly' ? 'selected' : '' }}>Yearly
                                        </option>
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must Select a Bill Type.</div>
                                    @error('status')
                                        <div id="validationStatusFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="max_image_count" class="form-label">Max Image Count <span
                                            class="text-danger">*</span></label>
                                    <input type="number" min="6"
                                        class="form-control @error('max_image_count') is-invalid @enderror"
                                        id="max_image_count" name="max_image_count"
                                        placeholder="Enter Max Image for This Type" required
                                        aria-describedby="validationNameFeedback"
                                        value="{{ old('max_image_count') ? old('max_image_count') : 6 }}">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must enter Max Image for this type.</div>
                                    @error('max_image_count')
                                        <div id="validationNameFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="max_content_length" class="form-label">Max Content Length <span
                                            class="text-danger">*</span></label>
                                    <input type="number" min="500"
                                        class="form-control @error('max_content_length') is-invalid @enderror"
                                        id="max_content_length" name="max_content_length"
                                        placeholder="Enter Max Content Length for This Type" required
                                        aria-describedby="validationNameFeedback"
                                        value="{{ old('max_content_length') ? old('max_content_length') : 500 }}">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">You must enter Max Content Length for This Type.</div>
                                    @error('max_content_length')
                                        <div id="validationNameFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="status" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status" required aria-describedby="validationStatusFeedback">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive
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
            <div class="col-6">
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
                                        <th>Bill</th>
                                        <th>Bill Type</th>
                                        <th>Max Image Count</th>
                                        <th>Max Content Length</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Bill</th>
                                        <th>Bill Type</th>
                                        <th>Max Image Count</th>
                                        <th>Max Content Length</th>
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
                "ajax": "{{ route('admin.partner-types.loadDataTable') }}",
                "columns": [{
                        "data": "name"
                    },
                    {
                        "data": "bill"
                    },
                    {
                        "data": "bill_type"
                    },
                    {
                        "data": "max_image_count"
                    },
                    {
                        "data": "max_content_length"
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
                url: `{{ route('admin.partner-types.fetch') }}`,
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                type: 'post',
                dataType: 'json',
                success: function(response) {

                    $("#id").val(response.id);
                    $("#name").val(response.name);
                    $("#bill").val(response.bill);
                    $("#bill_type").val(response.bill_type);
                    $("#max_image_count").val(response.max_image_count);
                    $("#max_content_length").val(response.max_content_length);

                }
            });
        }
    </script>
@endsection
