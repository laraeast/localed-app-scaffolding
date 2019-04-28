@extends('layouts.dashboard')
@section('content')
    @component('adminlte::page', ['title' => trans('categories.actions.edit'), 'breadcrumb' => [
        'dashboard.categories.edit', $category
    ]])

        @php(BsForm::resource('categories'))

        {{ BsForm::putModel($category, route('dashboard.categories.update', $category)) }}

        @component('adminlte::box')

            @include('dashboard.categories.partials.form')

        @endcomponent

        {{ BsForm::close() }}
    @endcomponent
@endsection
