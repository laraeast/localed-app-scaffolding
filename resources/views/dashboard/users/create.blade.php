@extends('layouts.dashboard', ['title' => trans('users.plural')])
@section('content')
    @component('adminlte::page', ['title' => trans('users.actions.create'), 'breadcrumb' => 'dashboard.users.create'])

        @php(BsForm::resource('users'))

        {{ BsForm::post(route('dashboard.users.store')) }}

        @component('adminlte::box')

            @include('dashboard.users.partials.form')

        @endcomponent

        {{ BsForm::close() }}
    @endcomponent
@endsection
