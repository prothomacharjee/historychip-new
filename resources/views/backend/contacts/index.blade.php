@extends('backend.layouts.header')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Contact</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Contacts</li>
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
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-4 border rounded">
                            <table id="dt_contact_table" class="table table-striped table-bordered data-tables"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date & Time</th>
                                        <th>Message</th>
                                        <th>Replied Message</th>
                                        <th>Replied At</th>
                                        <th>Replied By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date & Time</th>
                                        <th>Message</th>
                                        <th>Replied Message</th>
                                        <th>Replied At</th>
                                        <th>Replied By</th>
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
            $("#dt_contact_table").DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.contacts.loadDataTable') }}",

                "columns": [{
                        "data": "name"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": "created_at"
                    },
                    {
                        "data": "message"
                    },
                    {
                        "data": "replied_message"
                    },
                    {
                        "data": "replied_at"
                    },
                    {
                        "data": "replied_by"
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
