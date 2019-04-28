@extends('layouts.dashboard')
@section('content')
    @component('adminlte::page', ['title' => trans('users.actions.edit'), 'breadcrumb' => [
        'dashboard.users.edit', $user
    ]])

        @php(BsForm::resource('users'))

        {{ BsForm::putModel($user, route('dashboard.users.update', $user)) }}

        @component('adminlte::box')

            @include('dashboard.users.partials.form')

        @endcomponent

        {{ BsForm::close() }}
    @endcomponent
@endsection
