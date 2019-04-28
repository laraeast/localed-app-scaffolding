@extends('layouts.dashboard')
@section('content')
    @component('adminlte::page', ['title' => trans('admins.actions.edit'), 'breadcrumb' => [
        'dashboard.admins.edit', $admin
    ]])

        @php(BsForm::resource('admins'))

        {{ BsForm::putModel($admin, route('dashboard.admins.update', $admin)) }}

        @component('adminlte::box')

            @include('dashboard.admins.partials.form')

        @endcomponent

        {{ BsForm::close() }}
    @endcomponent
@endsection
