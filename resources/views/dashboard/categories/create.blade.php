@extends('layouts.dashboard', ['title' => trans('categories.plural')])
@section('content')
    @component('adminlte::page', ['title' => trans('categories.actions.create'), 'breadcrumb' => 'dashboard.categories.create'])

        @php(BsForm::resource('categories'))

        {{ BsForm::post(route('dashboard.categories.store')) }}

        @component('adminlte::box')

            @include('dashboard.categories.partials.form')

        @endcomponent

        {{ BsForm::close() }}
    @endcomponent
@endsection
