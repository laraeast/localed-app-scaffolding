@extends('layouts.dashboard')

@section('content')

    @component('adminlte::page', ['title' => trans('dashboard.home'), 'breadcrumb' => 'dashboard.home'])

        <div class="row">

            <div class="col-md-3">
                @include('adminlte::info-box', [
                    'icon_color' => 'green',
                    'icon' => 'user-secret',
                    'text' => 'Admins',
                    'number' => '1',
                ])
            </div>

            <div class="col-md-3">
                @include('adminlte::info-box', [
                    'icon_color' => 'red',
                    'icon' => 'users',
                    'text' => 'Users',
                    'number' => '3',
                ])
            </div>

            <div class="col-md-3">
                @include('adminlte::info-box', [
                    'icon_color' => 'yellow',
                    'icon' => 'list',
                    'text' => 'Categories',
                    'number' => '3',
                ])
            </div>

            <div class="col-md-3">
                @include('adminlte::info-box', [
                    'icon_color' => 'blue',
                    'icon' => 'envelope-o',
                    'text' => 'Unread Messages',
                    'number' => '5',
                ])
            </div>

        </div>

    @endcomponent

@endsection
