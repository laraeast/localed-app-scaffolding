<?php

// Home / Feedback
Breadcrumbs::register('dashboard.feedback.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.home');
    $breadcrumbs->push(trans('feedback.plural'), route('dashboard.feedback.index'));
});

// Home / Feedback / {message}
Breadcrumbs::register('dashboard.feedback.show', function ($breadcrumbs, $feedback) {
    $breadcrumbs->parent('dashboard.feedback.index');
    $breadcrumbs->push($feedback->name, route('dashboard.feedback.show', $feedback));
});
