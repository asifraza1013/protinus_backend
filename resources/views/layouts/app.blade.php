<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Qubes Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Qubes admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ (isset($title)) ? $title : '' }} Protinus Admin</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets//assets/vendor/animate-css/vivify.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets//assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/sweetalert/sweetalert.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/c3/c3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><i class="fa fa-cube font-25"></i></div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <div id="wrapper">
        @include('layouts.inc.sidebar')

        <div id="main-content">
            @yield('content')
        </div>
    </div>
    <!-- Javascript -->
    <!-- Latest jQuery -->
    <script src="{{ asset('assets/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap 4x JS  -->
    <script src="{{ asset('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- <script src="{{ asset('assets/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script> --}}

    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/flotscripts.bundle.js') }}"></script><!-- flot charts Plugin Js -->
    <script src="{{ asset('assets/bundles/knob.bundle.js') }}"></script>

    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>

     <!-- Project Common JS -->
     <script src="{{ asset('assets/bundles/chartist.bundle.js') }}"></script>
     <script src="{{ asset('assets/js/pages/charts/chartjs.js') }}"></script>

    <script>
        $(document).ready(function () {
        jQuery(function($) {
            $('#left-sidebar li').removeClass('active');
                var path = window.location.href;
                $('#left-sidebar li a').each(function() {
                    if(this.href == path && this.href != '#'){
                        $(this).closest('ul li').addClass('active');
                        $(this).attr('aria-expanded', true);
                        $(this).closest('ul').attr('aria-expanded', true);
                        $(this).closest('ul').addClass('in');
                        $(this).closest('li').addClass('active');
                        $(this).closest('.has-arrow').attr("aria-expanded", "true");
                    }
                    // if (this.href === path) {
                    //     $(this).closest('li').addClass('active');
                    // }
                });
            });
        });
    </script>
</body>

</html>
