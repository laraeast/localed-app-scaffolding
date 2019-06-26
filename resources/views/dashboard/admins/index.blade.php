@extends('layouts.dashboard', ['title' => trans('admins.plural')])

@section('content')
    @component('adminlte::page', ['title' => trans('admins.plural'), 'breadcrumb' => 'dashboard.admins.index'])
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-12">
                        @can('create', \App\Models\Admin::class)
                            <a href="{{ route('dashboard.admins.create') }}" class="pull-right btn btn-success">
                                <i class="fa fa-plus"></i>
                                @lang('admins.actions.create')
                            </a>
                        @endcan
                    </div><!-- /.col-lg-12 -->
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-hover table-middle">
                    <thead>
                    <tr>
                        <th width="100">#</th>
                        <th></th>
                        <th>@lang('admins.attributes.name')</th>
                        <th>@lang('admins.attributes.email')</th>
                        <th width="300">...</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td>{{ Html::linkRoute('dashboard.admins.show', $admin->id, $admin) }}</td>
                            <td width="60">
                                <a href="{{ $admin->present()->getShowUrl() }}">
                                    <img src="{{ $admin->getAvatar() }}"
                                         class="img img-circle img-bordered"
                                         width="50"
                                         height="50"
                                         alt="{{ $admin->name }}">
                                </a>
                            </td>
                            <td>{{ Html::linkRoute('dashboard.admins.show', $admin->name, $admin) }}</td>
                            <td>{{ $admin->email}}</td>
                            <td>
                                {{ $admin->present()->showButton }}
                                {{ $admin->present()->editButton }}
                                {{ $admin->present()->deleteButton }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if($admins->hasPages())
                <div class="panel-footer">
                    {{ $admins->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    @endcomponent
@endsection
