<?php

// Home / categories
Breadcrumbs::register('dashboard.categories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.home');
    $breadcrumbs->push(trans('categories.plural'), route('dashboard.categories.index'));
});

// Home / categories / create
Breadcrumbs::register('dashboard.categories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.categories.index');
    $breadcrumbs->push(trans('categories.actions.create'), route('dashboard.categories.create'));
});

// Home / categories / {category}
Breadcrumbs::register('dashboard.categories.show', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('dashboard.categories.index');
    $breadcrumbs->push($category->name, route('dashboard.categories.show', $category));
});

// Home / categories / {category} / edit
Breadcrumbs::register('dashboard.categories.edit', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('dashboard.categories.show', $category);
    $breadcrumbs->push(trans('categories.actions.edit'), route('dashboard.categories.edit', $category));
});
