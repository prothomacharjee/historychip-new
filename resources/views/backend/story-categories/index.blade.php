@extends('backend.layouts.header')

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Story Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Story Categories</li>
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
                        {{-- <div>{{ session('success') }}
                    </div> --}}
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
                    {{-- <div>{{ session('error') }}
                </div> --}}
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

<div class="col-4">
    {{-- <h6 class="mb-0 text-uppercase">Notice Prompts</h6>
                <hr /> --}}
    <div class="card">
        <div class="card-body">
            <div class="p-4 border rounded">
                <form class="row g-3 needs-validation" novalidate action="{{ route('admin.story-categories.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id" value="" />
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="A unique category name" required aria-describedby="validationNameFeedback" value="{{ old('name') }}">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">You must enter an unique category name.</div>
                        @error('name')
                        <div id="validationNameFeedback" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea minlength="3" maxlength="191" rows="5" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Write your Description here" aria-describedby="validationDescriptionFeedback">{{ old('description') }}</textarea>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Maximum 191 character and Minimum 3 characters allowed
                        </div>
                        @error('description')
                        <div id="validationDescriptionFeedback" class="invalid-feedback">{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="level" class="form-label">Level <span class="text-danger">*</span></label>
                        <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required aria-describedby="validationLevelFeedback">
                            <option value="0" {{ old('level') == 1 ? 'selected' : 'selected' }}>Base level
                            </option>
                            <option value="1" {{ old('level') == 1 ? 'selected' : '' }}>Level 1</option>
                            <option value="2" {{ old('level') == 2 ? 'selected' : '' }}>Level 2</option>
                            <option value="3" {{ old('level') == 3 ? 'selected' : '' }}>Level 3</option>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">You must Select a level.</div>
                        @error('level')
                        <div id="validationLevelFeedback" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 parent_category_div" style="display:none">
                        <label for="parent_id" class="form-label">Parent Category <span class="text-danger">*</span></label>
                        <select class="form-select @error('parent_id') is-invalid @enderror softsource-select2" id="parent_id" name="parent_id" aria-describedby="validationParentCatFeedback">

                        </select>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">You must Select a parent category.</div>
                        @error('parent_id')
                        <div id="validationParentCatFeedback" class="invalid-feedback">{{ $message }}
                        </div>
                        @enderror
                    </div>



                    <div class="col-md-12">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required aria-describedby="validationStatusFeedback">
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
<div class="col-8">
    {{-- <h6 class="mb-0 text-uppercase">Notice Prompts List</h6>
                <hr /> --}}
    <div class="card">
        <div class="card-body">

            <ul class="nav nav-tabs nav-primary" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#base_category" role="tab" aria-selected="true">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bxs-dice-1 font-18 me-1'></i>
                            </div>
                            <div class="tab-title">Base category</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#level_1_cat" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bxs-dice-2 font-18 me-1'></i>
                            </div>
                            <div class="tab-title">Level 1 category</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#level_2_cat" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bxs-dice-3 font-18 me-1'></i>
                            </div>
                            <div class="tab-title">Level 2 category</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#level_3_cat" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bxs-dice-4 font-18 me-1'></i>
                            </div>
                            <div class="tab-title">Level 3 category</div>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content py-3">
                <div class="tab-pane fade show active" id="base_category" role="tabpanel">
                    <div class="table-responsive p-4 border rounded">
                        <table id="dt_story_base_category" class="table table-striped table-bordered data-tables" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Level</th>
                                    <th>Parent</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Level</th>
                                    <th>Parent</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="level_1_cat" role="tabpanel">
                    <div class="table-responsive p-4 border rounded">
                        <table id="dt_story_level_1_category" class="table table-striped table-bordered data-tables" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Level</th>
                                    <th>Parent</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Level</th>
                                    <th>Parent</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="level_2_cat" role="tabpanel">
                    <div class="table-responsive p-4 border rounded">
                        <table id="dt_story_level_2_category" class="table table-striped table-bordered data-tables" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Level</th>
                                    <th>Parent</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Level</th>
                                    <th>Parent</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="level_3_cat" role="tabpanel">
                    <div class="table-responsive p-4 border rounded">
                        <table id="dt_story_level_3_category" class="table table-striped table-bordered data-tables" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Level</th>
                                    <th>Parent</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Level</th>
                                    <th>Parent</th>
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
</div>
</div>
<!--end row-->
</div>

<script>
    $(document).ready(function() {
        //Category
        let base_table = $("#dt_story_base_category").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('admin.story-categories.loadDataTable') }}",
            "columns": [{
                    "data": "serial"
                },
                {
                    "data": "name"
                },
                {
                    "data": "description"
                },
                {
                    "data": "level"
                },
                {
                    "data": "parent"
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

        base_table.on("draw.dt", function() {
            var info = base_table.page.info();
            base_table
                .column(0, {
                    search: "applied",
                    order: "applied",
                })
                .nodes()
                .each(function(cell, i) {
                    cell.innerHTML = i + 1 + info.start;
                });
        });


        let level1_table = $("#dt_story_level_1_category").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('admin.story-categories.loadDataTable1') }}",
            "columns": [{
                    "data": "serial"
                },
                {
                    "data": "name"
                },
                {
                    "data": "description"
                },
                {
                    "data": "level"
                },
                {
                    "data": "parent"
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

        level1_table.on("draw.dt", function() {
            var info = level1_table.page.info();
            level1_table
                .column(0, {
                    search: "applied",
                    order: "applied",
                })
                .nodes()
                .each(function(cell, i) {
                    cell.innerHTML = i + 1 + info.start;
                });
        });

        let level2_table = $("#dt_story_level_2_category").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('admin.story-categories.loadDataTable2') }}",
            "columns": [{
                    "data": "serial"
                },
                {
                    "data": "name"
                },
                {
                    "data": "description"
                },
                {
                    "data": "level"
                },
                {
                    "data": "parent"
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

        level2_table.on("draw.dt", function() {
            var info = level2_table.page.info();
            level2_table
                .column(0, {
                    search: "applied",
                    order: "applied",
                })
                .nodes()
                .each(function(cell, i) {
                    cell.innerHTML = i + 1 + info.start;
                });
        });


        let level3_table = $("#dt_story_level_3_category").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('admin.story-categories.loadDataTable3') }}",
            "columns": [{
                    "data": "serial"
                },
                {
                    "data": "name"
                },
                {
                    "data": "description"
                },
                {
                    "data": "level"
                },
                {
                    "data": "parent"
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

        level3_table.on("draw.dt", function() {
            var info = level3_table.page.info();
            level3_table
                .column(0, {
                    search: "applied",
                    order: "applied",
                })
                .nodes()
                .each(function(cell, i) {
                    cell.innerHTML = i + 1 + info.start;
                });
        });


    });


    function editFunc(id) {
        $.ajax({
            url: `{{ route('admin.story-categories.fetch') }}`,
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {

                $("#id").val(response.id);
                $("#name").val(response.name);
                $("#description").val(response.description);
                $("#level").val(response.level);
                LoadParentDropDown(response.level - 1, response.parent_id);
                $("#status").val(response.status);
                $('.note-icon-caret').hide();
            }
        });
    }

    $(document).on('change', '#level', function() {

        let level = $(this).val();
        let parent_level = Number(level) - 1;

        if (Number(level) != 0) {

        } else {
            $('.parent_category_div').fadeOut(500);
            $('#parent_id').prop('required', false);
        }
    })

    function LoadParentDropDown(parent_level, parent_id = null) {
        $.ajax({
            url: `{{ route('admin.story-categories.fetchByLevel') }}`,
            data: {
                '_token': '{{ csrf_token() }}',
                'level': parent_level
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $('#parent_id').empty();
                //for each loop on response variable and create a html string for selection option
                $.each(response, function(key, value) {
                    $('#parent_id').append(
                        `<option value="${value.id}">${value.name}</option>`
                    );
                });

                $('.parent_category_div').fadeIn(1000);
                $('#parent_id').prop('required', true).val(parent_id);

            }
        });
    }
</script>
@endsection
