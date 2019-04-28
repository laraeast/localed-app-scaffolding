@extends('layouts.dashboard')
@section('content')
    @component('adminlte::page', ['title' => trans('admins.actions.create'), 'breadcrumb' => 'dashboard.admins.create'])

        @php(BsForm::resource('admins'))

        {{ BsForm::post(route('dashboard.admins.store')) }}

        @component('adminlte::box')

            @include('dashboard.admins.partials.form')

        @endcomponent

        {{ BsForm::close() }}
    @endcomponent
@endsection
