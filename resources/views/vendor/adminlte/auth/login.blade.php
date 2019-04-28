@extends('adminlte::auth.layout', ['title' => trans('adminlte::dashboard.auth.login.title')])

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('adminlte.urls.base') }}">
                <b>{{ config('app.name') }}</b>
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">@lang('adminlte::dashboard.auth.login.message')</p>

            <form action="{{ config('adminlte.urls.login') }}" method="post">
                @csrf
                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="@lang('adminlte::dashboard.auth.login.email')">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="@lang('adminlte::dashboard.auth.login.password')">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember">
                                @lang('adminlte::dashboard.auth.login.remember')
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            @lang('adminlte::dashboard.auth.login.submit')
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {!! $social ?? '' !!}

            @if($passwordRequestUrl = config('adminlte.urls.password_request'))
                <a href="{{ url($passwordRequestUrl) }}">@lang('adminlte::dashboard.auth.login.forget')</a><br>
            @endif

            @if($registerUrl = config('adminlte.urls.register'))
                <a href="{{ url($registerUrl) }}" class="text-center">@lang('adminlte::dashboard.auth.login.register')</a>
            @endif

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection