<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="{{ auth()->user()->present()->getShowUrl() }}" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ auth()->user()->getAvatar() }}" class="user-image" alt="{{ auth()->user()->name }}">
        <span class="hidden-xs">{{ auth()->user()->name }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="{{ auth()->user()->getAvatar() }}" class="img-circle" alt="{{ auth()->user()->name }}">
            <p>
                {{ auth()->user()->name }}
                @if ($created_at = auth()->user()->created_at)
                    <small>
                        @lang('adminlte::dashboard.auth.since')
                        <span title="{{ $created_at }}">
                            {{ $created_at->diffForHumans() }}
                        </span>
                    </small>
                @endif
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="{{ auth()->user()->present()->getShowUrl() }}" class="btn btn-default btn-flat">
                    @lang('adminlte::dashboard.profile')
                </a>
            </div>
            <div class="pull-right">
                <a href="#"
                   class="btn btn-default btn-flat"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >@lang('adminlte::dashboard.auth.logout')</a>

                <form id="logout-form" action="{{ url(config('adminlte.urls.logout', 'logout')) }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</li>
