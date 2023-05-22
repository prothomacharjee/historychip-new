@extends('backend.layouts.header')

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Story</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Stories</li>
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
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-primary" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#approved_comments" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bxs-dice-1 font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Approved</div>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#waiting_comments" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bxs-dice-2 font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Waiting for Approval</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#rejected_comments" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bxs-dice-3 font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Rejected</div>
                                </div>
                            </a>
                        </li>


                    </ul>
                    <div class="tab-content py-3">
                        <div class="tab-pane fade show active" id="approved_comments" role="tabpanel">
                            <div class="table-responsive p-4 border rounded">
                                <table id="dt_approved_comments_table" class="table table-striped table-bordered data-tables" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Story Title</th>
                                            <th>Story Author</th>
                                            <th>Commentator</th>
                                            <th>Comment</th>
                                            <th>Comment Date</th>
                                            <th>Approved By</th>
                                            <th>Approved Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Story Title</th>
                                            <th>Story Author</th>
                                            <th>Commentator</th>
                                            <th>Comment</th>
                                            <th>Comment Date</th>
                                            <th>Approved By</th>
                                            <th>Approved Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="waiting_comments" role="tabpanel">
                            <div class="table-responsive p-4 border rounded">
                                <table id="dt_waiting_comments_table" class="table table-striped table-bordered data-tables" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Story Title</th>
                                            <th>Story Author</th>
                                            <th>Commentator</th>
                                            <th>Comment</th>
                                            <th>Comment Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Story Title</th>
                                            <th>Story Author</th>
                                            <th>Commentator</th>
                                            <th>Comment</th>
                                            <th>Comment Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="rejected_comments" role="tabpanel">
                            <div class="table-responsive p-4 border rounded">
                                <table id="dt_rejected_comments_table" class="table table-striped table-bordered data-tables" style="width:100%">
                                    <thead>
                                        <tr>
                                            <!-- <th># <input type="checkbox" id="ckbCheckAll"></th> -->
                                            <th>Sl No</th>
                                            <th>Story Title</th>
                                            <th>Story Author</th>
                                            <th>Commentator</th>
                                            <th>Comment</th>
                                            <th>Comment Date</th>
                                            <th>Rejected By</th>
                                            <th>Rejected Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <!-- <th># <input type="checkbox" id="ckbCheckAll"></th> -->
                                            <th>Sl No</th>
                                            <th>Story Title</th>
                                            <th>Story Author</th>
                                            <th>Commentator</th>
                                            <th>Comment</th>
                                            <th>Comment Date</th>
                                            <th>Rejected By</th>
                                            <th>Rejected Date</th>
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
        $("#dt_approved_comments_table").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('admin.stories.LoadApproveCommentDataTable') }}",

            "columns": [{
                    "data": "serial"
                },
                {
                    "data": "story_title"
                },
                {
                    "data": "story_author"
                },
                {
                    "data": "commentator"
                },
                {
                    "data": "comment"
                },
                {
                    "data": "created_at"
                },
                {
                    "data": "approval"
                },
                {
                    "data": "accepting_date_time"
                },
                {
                    "data": "action",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $("#dt_waiting_comments_table").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('admin.stories.LoadWaitingCommentDataTable') }}",

            "columns": [{
                    "data": "serial"
                },
                {
                    "data": "story_title"
                },
                {
                    "data": "story_author"
                },
                {
                    "data": "commentator"
                },
                {
                    "data": "comment"
                },
                {
                    "data": "created_at"
                },
                {
                    "data": "action",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $("#dt_rejected_comments_table").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('admin.stories.LoadRejectedCommentDataTable') }}",

            "columns": [{
                    "data": "serial"
                },
                {
                    "data": "story_title"
                },
                {
                    "data": "story_author"
                },
                {
                    "data": "commentator"
                },
                {
                    "data": "comment"
                },
                {
                    "data": "created_at"
                },
                {
                    "data": "approval"
                },
                {
                    "data": "accepting_date_time"
                },
                {
                    "data": "action",
                    orderable: false,
                    searchable: false
                }
            ]
        });


    });
</script>
@endsection
