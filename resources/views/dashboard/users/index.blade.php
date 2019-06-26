@extends('layouts.dashboard', ['title' => trans('users.plural')])

@section('content')
    @component('adminlte::page', ['title' => trans('users.plural'), 'breadcrumb' => 'dashboard.users.index'])
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-12">
                        @can('create', \App\Models\User::class)
                            <a href="{{ route('dashboard.users.create') }}" class="pull-right btn btn-success">
                                <i class="fa fa-plus"></i>
                                @lang('users.actions.create')
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
                        <th>@lang('users.attributes.name')</th>
                        <th>@lang('users.attributes.email')</th>
                        <th width="300">...</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ Html::linkRoute('dashboard.users.show', $user->id, $user) }}</td>
                            <td width="60">
                                <a href="{{ $user->present()->getShowUrl() }}">
                                    <img src="{{ $user->getAvatar() }}"
                                         class="img img-circle img-bordered"
                                         width="50"
                                         height="50"
                                         alt="{{ $user->name }}">
                                </a>
                            </td>
                            <td>{{ Html::linkRoute('dashboard.users.show', $user->name, $user) }}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                {{ $user->present()->showButton }}
                                {{ $user->present()->editButton }}
                                {{ $user->present()->deleteButton }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if($users->hasPages())
                <div class="panel-footer">
                    {{ $users->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    @endcomponent
@endsection
