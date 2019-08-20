@extends('layouts.dashboard')

@section('content')
    @component('adminlte::page', ['title' => trans('feedback.plural'), 'breadcrumb' => 'dashboard.feedback.index'])
        @component('adminlte::table-box', ['solid' => true, 'title' => '', 'collection' => $feedback])
            <tr>
                <th>#</th>
                <th>@lang('feedback.attributes.name')</th>
                <th>@lang('feedback.attributes.email')</th>
                <th>@lang('feedback.attributes.created_at')</th>
                <th>...</th>
            </tr>
            @foreach($feedback as $message)
                <tr>
                    <td>
                        {{ Html::linkRoute('dashboard.feedback.show', $message->id, $message) }}
                    </td>
                    <td>
                        <a href="{{ route('dashboard.feedback.show', $message) }}">
                            @if(! $message->isReaded())
                                <div class="label label-danger">@lang('feedback.new')</div>
                            @endif
                            &nbsp;
                            {{ $message->name }}
                        </a>
                    </td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->created_at->diffForHumans() }}</td>
                    <td>
                        {{ $message->present()->showButton }}
                        {{ $message->present()->deleteButton }}
                    </td>
                </tr>
            @endforeach
        @endcomponent
    @endcomponent
@endsection
