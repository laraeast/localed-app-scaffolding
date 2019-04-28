@extends('adminlte::auth.layout', ['title' => trans('adminlte::dashboard.auth.email.title')])

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('adminlte.urls.base') }}">
                <b>{{ config('app.name') }}</b>
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">@lang('adminlte::dashboard.auth.email.message')</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ url(config('adminlte.urls.password_email', 'password/email')) }}" method="post">
                @csrf

                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ $email ?? old('email') }}"
                           placeholder="@lang('adminlte::dashboard.auth.email.email')">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >{{ trans('adminlte::dashboard.auth.email.submit') }}</button>
            </form>
            <div class="auth-links">
                <a href="{{ url(config('adminlte.urls.login', 'login')) }}"
                   class="text-center">@lang('adminlte::dashboard.auth.email.login')</a>
            </div>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@endsection