<?php

// Home / admins
Breadcrumbs::register('dashboard.admins.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.home');
    $breadcrumbs->push(trans('admins.plural'), route('dashboard.admins.index'));
});

// Home / admins / create
Breadcrumbs::register('dashboard.admins.create', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.admins.index');
    $breadcrumbs->push(trans('admins.actions.create'), route('dashboard.admins.create'));
});

// Home / admins / {admin}
Breadcrumbs::register('dashboard.admins.show', function ($breadcrumbs, $admin) {
    $breadcrumbs->parent('dashboard.admins.index');
    $breadcrumbs->push($admin->name, route('dashboard.admins.show', $admin));
});

// Home / admins / {admin} / edit
Breadcrumbs::register('dashboard.admins.edit', function ($breadcrumbs, $admin) {
    $breadcrumbs->parent('dashboard.admins.show', $admin);
    $breadcrumbs->push(trans('admins.actions.edit'), route('dashboard.admins.edit', $admin));
});
