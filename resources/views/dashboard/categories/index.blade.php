@extends('layouts.dashboard')

@section('content')
    @component('adminlte::page', ['title' => trans('categories.plural'), 'breadcrumb' => 'dashboard.categories.index'])
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-12">
                        @can('create', \App\Models\Category::class)
                            <a href="{{ route('dashboard.categories.create') }}" class="pull-right btn btn-success">
                                <i class="fa fa-plus"></i>
                                @lang('categories.actions.create')
                            </a>
                        @endcan
                    </div><!-- /.col-lg-12 -->
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-hover table-middle">
                    <thead>
                    <tr>
                        <th width="100">#</th>
                        <th>@lang('categories.attributes.name')</th>
                        <th width="300">...</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ Html::linkRoute('dashboard.categories.show', $category->id, $category) }}</td>
                            <td>{{ Html::linkRoute('dashboard.categories.show', $category->name, $category) }}</td>
                            <td>
                                {{ $category->present()->showButton }}
                                {{ $category->present()->editButton }}
                                {{ $category->present()->deleteButton }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if($categories->hasPages())
                <div class="panel-footer">
                    {{ $categories->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    @endcomponent
@endsection
