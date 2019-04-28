@extends('layouts.dashboard')
@section('content')
    @component('adminlte::page', ['title' => $user->name, 'breadcrumb' => [
        'dashboard.users.show', $user
    ]])

        @component('adminlte::box')

            <table class="table table-striped table-middle">
                <tbody>
                <tr>
                    <th width="200">@lang('users.attributes.name')</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('users.attributes.email')</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('users.attributes.avatar')</th>
                    <td>
                        <img src="{{ $user->getAvatar() }}"
                             class="img"
                             width="300"
                             height="300"
                             alt="{{ $user->name }}">
                    </td>
                </tr>
                </tbody>
            </table>

            @slot('footer')
                {{ $user->present()->editButton }}
                {{ $user->present()->deleteButton }}
            @endslot
        @endcomponent

    @endcomponent
@endsection
