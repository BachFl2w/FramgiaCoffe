<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @routes()
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('admin_template/apple-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('admin_template/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/css/lib/datatable/buttons.dataTables.bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('admin_template/assets/scss/style.css') }}">

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
</body>
</html>
