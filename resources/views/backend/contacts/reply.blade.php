@extends('backend.layouts.header')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Reply</div>
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
                            <form class="row g-3 needs-validation" method="post" novalidate action="{{ route('admin.contacts.send') }}"
                                method="post">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $contact->id }}" />
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" disabled type="text" class="form-control" value="{{ $contact->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" disabled type="text" class="form-control" value="{{ $contact->email }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Message</label>
                                    <div readonly class="border border-2 border-light rounded bg-light p-3 shadow-sm">
                                        {{ $contact->message }}
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="replied_message" class="form-label">Reply Message <span class="text-danger">*</span></label>
                                    <textarea minlength="3" maxlength="191" rows="10" class="form-control summernote @error('content') is-invalid @enderror"
                                        id="replied_message" name="replied_message" placeholder="Write your Reply Message here" required
                                        aria-describedby="validationContentFeedback">{{ old('replied_message') }}</textarea>

                                    <div class="invalid-feedback">You must enter a Reply Content Here.</div>
                                    @error('replied_message')
                                        <div id="validationContentFeedback" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-outline-primary" type="submit">Sent</button>
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

        });



    </script>
@endsection
