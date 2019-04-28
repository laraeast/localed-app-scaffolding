<?php

// Home / Categories
Breadcrumbs::register('dashboard.categories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.home');
    $breadcrumbs->push(trans('categories.plural'), route('dashboard.categories.index'));
});

// Home / Categories / Create
Breadcrumbs::register('dashboard.categories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.categories.index');
    $breadcrumbs->push(trans('categories.actions.create'), route('dashboard.categories.create'));
});

// Home / Categories / {category}
Breadcrumbs::register('dashboard.categories.show', function ($breadcrumbs, $category) {
    if ($parent = $category->parent) {
        $breadcrumbs->parent('dashboard.categories.show', $parent);
    } else {
        $breadcrumbs->parent('dashboard.categories.index');
    }
    $breadcrumbs->push($category->name, route('dashboard.categories.show', $category));
});

// Home / Categories / {category} / Edit
Breadcrumbs::register('dashboard.categories.edit', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('dashboard.categories.show', $category);
    $breadcrumbs->push(trans('categories.actions.edit'), route('dashboard.categories.edit', $category));
});
