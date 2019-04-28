<?php

// Home / Users
Breadcrumbs::register('dashboard.users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.home');
    $breadcrumbs->push(trans('users.plural'), route('dashboard.users.index'));
});

// Home / Users / Create
Breadcrumbs::register('dashboard.users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.users.index');
    $breadcrumbs->push(trans('users.actions.create'), route('dashboard.users.create'));
});

// Home / Users / {user}
Breadcrumbs::register('dashboard.users.show', function ($breadcrumbs, $user) {
    if ($parent = $user->parent) {
        $breadcrumbs->parent('dashboard.users.show', $parent);
    } else {
        $breadcrumbs->parent('dashboard.users.index');
    }
    $breadcrumbs->push($user->name, route('dashboard.users.show', $user));
});

// Home / Users / {user} / Edit
Breadcrumbs::register('dashboard.users.edit', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('dashboard.users.show', $user);
    $breadcrumbs->push(trans('users.actions.edit'), route('dashboard.users.edit', $user));
});
