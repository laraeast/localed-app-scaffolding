@extends('layouts.dashboard')
@section('content')
    @component('adminlte::page', ['title' => $admin->name, 'breadcrumb' => [
        'dashboard.admins.show', $admin
    ]])

        @component('adminlte::box')

            <table class="table table-striped table-middle">
                <tbody>
                <tr>
                    <th width="200">@lang('admins.attributes.name')</th>
                    <td>{{ $admin->name }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('admins.attributes.email')</th>
                    <td>{{ $admin->email }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('admins.attributes.avatar')</th>
                    <td>
                        <img src="{{ $admin->getAvatar() }}"
                             class="img"
                             width="300"
                             height="300"
                             alt="{{ $admin->name }}">
                    </td>
                </tr>
                </tbody>
            </table>

            @slot('footer')
                {{ $admin->present()->editButton }}
                {{ $admin->present()->deleteButton }}
            @endslot
        @endcomponent

    @endcomponent
@endsection
