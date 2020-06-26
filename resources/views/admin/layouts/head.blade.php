<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base_url" content="{{ url('/'. app()->getLocale()) }}">
        <meta name="base" content="{{ url('/') }}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/components.min.css') }}" id="style_components">
        <link rel="stylesheet" href="{{URL('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL('assets/vendor/fonts/circular-std/style.css')}}">
        @if(App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{URL('assets/libs/css/styleAr.css')}}">
        @else
        <link rel="stylesheet" href="{{URL('assets/libs/css/style.css')}}">
        @endif
        <link rel="stylesheet" href="{{URL('assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
        <link rel="stylesheet" href="{{URL('assets/vendor/charts/chartist-bundle/chartist.css')}}">
        <link rel="stylesheet" href="{{URL('assets/vendor/charts/morris-bundle/morris.css')}}">
        <link rel="stylesheet" href="{{URL('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{URL('assets/vendor/charts/c3charts/c3.css')}}">
        <link rel="stylesheet" href="{{URL('assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
        <link rel="stylesheet" href="{{URL('assets/libs/css/custom.css')}}">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="{{asset('css/image-uploader.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/select.bootstrap4.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">

        @yield('StyleSheets')

        @yield('title')
    </head>

    <body>
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
            <!-- ============================================================== -->
            <!-- navbar -->
            <!-- ============================================================== -->
            <div class="dashboard-header">
                @include('admin.layouts.navbar')
            </div>
            <!-- ============================================================== -->
            <!-- end navbar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- left sidebar -->
            <!-- ============================================================== -->
            <div class="nav-left-sidebar sidebar-dark">
                @include('admin.layouts.sidebar')
            </div>
            <!-- ============================================================== -->
            <!-- end left sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <!-- jquery 3.3.1  -->
        <script src="{{URL('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
        <!-- bootstap bundle js -->
        <script src="{{URL('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
        <!-- slimscroll js -->
        <script src="{{URL('assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
        <!-- main js --->
        <script src="{{URL('assets/libs/js/main-js.js')}}"></script>
        <!-- chart chartist js -->
        <script src="{{URL('assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
        <script src="{{URL('assets/libs/js/dashboard-ecommerce.js')}}"></script>
        <!-- sparkline js -->
        <script src="{{URL('assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
        <script src="{{URL('assets/vendor/charts/sparkline/spark-js.js')}}"></script>
        <!-- morris js -->
        <script src="{{URL('assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
        <script src="{{URL('assets/vendor/charts/morris-bundle/morris.js')}}"></script>
        <!-- chart c3 js -->
        <script src="{{URL('assets/vendor/charts/c3charts/c3.min.js')}}"></script>
        <script src="{{URL('assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
        <script src="{{URL('assets/vendor/charts/c3charts/C3chartjs.js')}}"></script>
        <script src="{{asset('js/image-uploader.min.js')}}" type="text/javascript"></script>

        <script src="{{URL('assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script>
        <script src="{{URL('assets/cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL('assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{URL('assets/cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{URL('assets/vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{URL('assets/vendor/datatables/js/data-table.js')}}"></script>
        <script src="{{URL('assets/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
        <script src="{{URL('assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js')}}"></script>
        <script src="{{URL('assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js')}}"></script>
        <script src="{{URL('assets/cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js')}}"></script>
        <script src="{{URL('assets/cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js')}}"></script>
        <script src="{{URL('assets/cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js')}}"></script>
        <script src="{{URL('assets/cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js')}}"></script>
        <script src="{{URL('assets/cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js')}}"></script>
        <script src="{{URL('assets/cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{asset('js/intelligent.js')}}" type="text/javascript"></script>

        @yield('JavaScript')

    </body>

</html>
