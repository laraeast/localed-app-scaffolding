<!DOCTYPE html>
<html dir="{{ config('adminlte.appearence.dir') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/css/adminlte.'.config('adminlte.appearence.dir').'.css') }}">

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
<body class="hold-transition register-page">

<div class="login-box">
    {{--<div class="login-logo">--}}
    {{--@lang('adminlte::dashboard.auth.verify.title')--}}
    {{--</div>--}}

</div><!-- /.login-box -->
<div class="container">
    <div class="row justify-content-center">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('adminlte::dashboard.auth.verify.title')</div>

            <div class="panel-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        @lang('adminlte::dashboard.auth.verify.resent')
                    </div>
                @endif

                    @lang('adminlte::dashboard.auth.verify.note')
                    @lang('adminlte::dashboard.auth.verify.resend_note'), <a
                        href="{{ route('verification.resend') }}">@lang('adminlte::dashboard.auth.verify.resend')</a>.
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/js/adminlte.min.js') }}"></script>
<script src="{{ asset('/js/adminlte.init.js') }}"></script>
@stack('scripts')</body>
</html>
