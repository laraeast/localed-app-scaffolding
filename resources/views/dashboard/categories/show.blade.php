@extends('layouts.dashboard')
@section('content')
    @component('adminlte::page', ['title' => $category->name, 'breadcrumb' => [
        'dashboard.categories.show', $category
    ]])

        @component('adminlte::box')

            <table class="table table-striped table-middle">
                <tbody>
                <tr>
                    <th width="200">@lang('categories.attributes.name')</th>
                    <td>{{ $category->name }}</td>
                </tr>
                </tbody>
            </table>

            @slot('footer')
                {{ $category->present()->editButton }}
                {{ $category->present()->deleteButton }}
            @endslot
        @endcomponent

    @endcomponent
@endsection
