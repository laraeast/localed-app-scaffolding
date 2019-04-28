<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $title ?? trans('adminlte::dashboard.home') }} | {{ config('app.name') }}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- CSRF TOKEN -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('/css/adminlte.'.config('adminlte.appearence.dir').'.css') }}">
        <link rel="stylesheet" href="{{ asset(mix('/css/dashboard.css')) }}">

        @stack('styles')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-{{ config('adminlte.appearence.skin') }} sidebar-mini">
        <div class="wrapper" id="app">
            @include('adminlte::partials.header.header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('adminlte::partials.sidebar.sidebar')


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->

            @include('adminlte::partials.footer')

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <!-- AdminLTE  -->
        <script src="{{ asset('/js/adminlte.min.js') }}"></script>
        <script src="{{ asset(mix('/js/dashboard.js')) }}"></script>
        @stack('scripts')
    </body>
</html>
