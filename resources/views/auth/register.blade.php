@component('adminlte::auth.register')
    @slot('social')
        <div class="social-auth-links text-center">
            <p>- @lang('adminlte::dashboard.auth.login.or') -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat">
                <i class="fa fa-facebook"></i>
                @lang('adminlte::dashboard.auth.login.facebook')
            </a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                <i class="fa fa-google-plus"></i>
                @lang('adminlte::dashboard.auth.login.google')
            </a>
        </div>
        <!-- /.social-auth-links -->
    @endslot
@endcomponent
