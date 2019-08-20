@extends('layouts.dashboard')
@section('content')
    @component('adminlte::page', ['title' => $feedback->name, 'breadcrumb' => [
        'dashboard.feedback.show', $feedback
    ]])

        @component('adminlte::table-box', ['solid' => true, 'title' => ''])
            <tr>
                <th>#</th>
                <td>{{ $feedback->id }}</td>
            </tr>
            <tr>
                <th>@lang('feedback.attributes.name')</th>
                <td>{{ $feedback->name }}</td>
            </tr>
            <tr>
                <th>@lang('feedback.attributes.email')</th>
                <td>{{ $feedback->email }}</td>
            </tr>
            <tr>
                <th>@lang('feedback.attributes.phone')</th>
                <td>{{ $feedback->phone ?? '---' }}</td>
            </tr>
            <tr>
                <th>@lang('feedback.attributes.message')</th>
                <td>{{ $feedback->message }}</td>
            </tr>
            <tr>
                <th>@lang('feedback.attributes.created_at')</th>
                <td>{{ $feedback->created_at->toDateTimeString() }} ({{ $feedback->created_at->diffForHumans() }})</td>
            </tr>
            @slot('footer')
                {{ $feedback->present()->deleteButton }}
            @endslot
        @endcomponent

    @endcomponent
@endsection
