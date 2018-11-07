<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
<head>
    @routes()
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

{{-- <<<<<<< Updated upstream
    <link rel="apple-touch-icon" href="{{ asset('admin_template/apple-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('admin_template/favicon.ico') }}">
=======
    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="shortcut icon" href="favicon.ico">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }} ">

    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
   
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace('ckeditor'); </script>
>>>>>>> Stashed changes --}}

    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/lib/datatable/buttons.dataTables.bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> --}}
    <link rel="stylesheet" href="{{ asset('admin_template/assets/scss/style.css') }}">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>

    @include('layouts.left_panel')

    <div id="right-panel" class="right-panel">

        @include('layouts.header')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            @yield('page-title')
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            @yield('content')

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    @yield('script')

    
    <script src="{{ asset('admin_template/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ asset('admin_template/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins.js')}}"></script>
    <script src="{{ asset('admin_template/assets/js/main.js')}}"></script>


    <script src="{{ asset('admin_template/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/datatables-init.js') }}"></script>


    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/customer.js') }}" ></script>

    <script src="{{asset('assets/js/lib/chart-js/Chart.bundle.js')}}"></script>
    <script src="{{asset('assets/js/lib/chart-js/chartjs-init.js')}}"></script>

</body>
</html>
