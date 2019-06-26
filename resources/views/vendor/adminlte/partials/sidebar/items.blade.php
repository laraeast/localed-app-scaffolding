<ul class="sidebar-menu" data-widget="tree">
    <li class="{{ css_route_active('dashboard.home') }}">
        <a href="{{ route('dashboard.home') }}">
            <i class="fa fa-dashboard"></i>
            <span>@lang('dashboard.home')</span>
        </a>
    </li>
    @can('viewAny', \App\Models\Admin::class)
        <li class="{{ css_resource_active('dashboard.admins') }}">
            <a href="{{ route('dashboard.admins.index') }}">
                <i class="fa fa-user-secret"></i>
                <span>@lang('admins.plural')</span>
            </a>
        </li>
    @endcan
    @can('viewAny', \App\Models\User::class)
        <li class="{{ css_resource_active('dashboard.users') }}">
            <a href="{{ route('dashboard.users.index') }}">
                <i class="fa fa-users"></i>
                <span>@lang('users.plural')</span>
            </a>
        </li>
    @endcan
    @can('viewAny', \App\Models\Category::class)
        <li class="{{ css_resource_active('dashboard.categories') }}">
            <a href="{{ route('dashboard.categories.index') }}">
                <i class="fa fa-list"></i>
                <span>@lang('categories.plural')</span>
            </a>
        </li>
    @endcan
</ul>
