<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="color-sidebar sidebarcolor3">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />


    <!-- SEO -->
    <meta name="title" content="Revenue Aid, Consulting Firm, Revenue, SoftSource, RevenueAid, Prothom Acharjee">
    <meta name="description"
        content="Revenue Aid - A Unique Consulting Firm. Get Legal Help Provides and deals with all sorts of legal and professional services Keep Confidential Keep clients information confidential as for think fits and proper Avoid Unlawful Work Will not involved in unethical and unlawful work knowingly-Yeah, sure OUR MISSION OUR VISION OUR HISTORY To Our Country To contribute to the dream of Digital Bangladesh.">
    <meta name="keywords" content="Revenue Aid, Consulting Firm, Revenue, SoftSource, RevenueAid, Prothom Acharjee">


    <!-- Social Media -->
    <link rel="canonical" href="{{ URL::current() }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    {{-- <meta property="og:title" content="Home - Revenue Aid" />
	<meta property="og:url" content="<?= base_url() ?>" />
	<meta property="og:site_name" content="Revenue Aid" />
	<meta property="og:image" content="<?php echo base_url() . 'assets/webassets/images/Asset 1.png'; ?>" />
	<meta property="og:description"
			content="Get Legal Help Provides and deals with all sorts of legal and professional services Keep Confidential Keep clients information confidential as for think fits and proper Avoid Unlawful Work Will not involved in unethical and unlawful work knowingly-Yeah, sure OUR MISSION OUR VISION OUR HISTORY To Our Country To contribute to the dream of Digital Bangladesh." />
	<meta property=" article:modified_time" content="<?= date('d-M-Y H:i:s') ?>" /> --}}

    <!-- Author Info -->
    <meta name="author" content="SoftSource, Bangladesh">
    <meta name="author" content="Prothom Acharjee">
    <meta name="author" content="01818105488">

    <!-- Icon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/logo/favi.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title }} | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!--plugins-->
    <link href="{{ asset('backend/plugins/simplebar/css/simplebar.css?q=' . time()) }}" rel="stylesheet" />
    <link href="{{ asset('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css?q=' . time()) }}" rel="stylesheet" />
    <link href="{{ asset('backend/plugins/highcharts/css/highcharts.css?q=' . time()) }}" rel="stylesheet" />
    <link href="{{ asset('backend/plugins/metismenu/css/metisMenu.min.css?q=' . time()) }}" rel="stylesheet" />
    <link href="{{ asset('backend/plugins/datatable/css/dataTables.bootstrap5.min.css?q=' . time()) }}" rel="stylesheet" />
    <link href="{{ asset('backend/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css?q=' . time()) }}" rel="stylesheet" />
    <link href="{{ asset('backend/plugins/select2/css/select2.min.css?q=' . time()) }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/select2/css/select2-bootstrap4.css?q=' . time()) }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- loader-->
    <link href="{{ asset('backend/css/pace.min.css?q=' . time()) }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/css/animate/animate.min.css?q=' . time()) }}">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend/css/bootstrap.min.css?q=' . time()) }}" rel="stylesheet">
    <link href="{{ asset('backend/css/bootstrap-extended.css?q=' . time()) }}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/input-tags/css/tagsinput.css?q=' . time()) }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('backend/css/app.css?q=' . time()) }}" rel="stylesheet">
    <link href="{{ asset('backend/css/icons.css?q=' . time()) }}" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/dark-theme.css?q=' . time()) }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/semi-dark.css?q=' . time()) }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/header-colors.css?q=' . time()) }}" />


    <script src="{{ asset('backend/js/jquery.min.js?q=' . time()) }}"></script>

    <link href="{{ asset('backend/css/summernote/summernote-lite.min.css?q=' . time()) }}" rel="stylesheet">
    {{-- <link href="{{ asset('backend/plugins/Drag-And-Drop/dist/imageuploadify.min.css?q=' . time()) }}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/fancy-file-uploader/fancy_fileupload.css?q=' . time()) }}" rel="stylesheet"> --}}

    <link href="{{ asset('backend/css/backend.css?q=' . time()) }}" rel="stylesheet">
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">

        @include('backend.layouts.sidenavbar')
        @include('backend.layouts.topnavbar')

        <!--start page wrapper -->
        <div class="page-wrapper">
            @yield('content')
        </div>
        <!--end page wrapper -->

        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        @include('backend.layouts.footer')

    </div>
    <!--end wrapper-->


    <script src="{{ asset('backend/js/pace.min.js?q=' . time()) }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js?q=' . time()) }}"></script>
    <script src="{{ asset('backend/plugins/simplebar/js/simplebar.min.js?q=' . time()) }}"></script>
    <script src="{{ asset('backend/plugins/metismenu/js/metisMenu.min.js?q=' . time()) }}"></script>
    <script src="{{ asset('backend/plugins/datatable/js/jquery.dataTables.min.js?q=' . time()) }}"></script>
    <script src="{{ asset('backend/plugins/datatable/js/dataTables.bootstrap5.min.js?q=' . time()) }}"></script>
    <script src="{{ asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js?q=' . time()) }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap-material-datetimepicker/js/moment.min.js?q=' . time()) }}"></script>
    <script
        src="{{ asset('backend/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js?q=' . time()) }}">
    </script>
    	<script src="{{ asset('backend/plugins/select2/js/select2.min.js?q=' . time()) }}"></script>

    <script src="{{ asset('backend/plugins/input-tags/js/tagsinput.js?q=' . time()) }}"></script>
    <script src="{{ asset('backend/js/summernote/summernote-lite.min.js?q=' . time()) }}"></script>
    {{-- <script src="{{ asset('backend/plugins/Drag-And-Drop/dist/imageuploadify.min.js?q=' . time()) }}"></script>
    <script src="{{ asset('backend/plugins/fancy-file-uploader/jquery.ui.widget.js?q=' . time()) }}"></script>
    <script src="{{ asset('backend/plugins/fancy-file-uploader/jquery.fileupload.js?q=' . time()) }}"></script>
    <script src="{{ asset('backend/plugins/fancy-file-uploader/jquery.iframe-transport.js?q=' . time()) }}"></script>
    <script src="{{ asset('backend/plugins/fancy-file-uploader/jquery.fancy-fileupload.js?q=' . time()) }}"></script> --}}


    <!--app JS-->
    <script src="{{ asset('backend/js/app.js?q=' . time()) }}"></script>
    <script src="{{ asset('backend/js/custom-script.js?q=' . time()) }}"></script>

</body>

</html>
