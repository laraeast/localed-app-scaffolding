<!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <img src="{{ auth()->user()->getAvatar() }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p>{{ auth()->user()->name }}</p>
        <a href="{{ auth()->user()->present()->getShowUrl() }}">
            <i class="fa fa-circle text-success"></i>
            @lang('adminlte::dashboard.online')
        </a>
    </div>
</div>
