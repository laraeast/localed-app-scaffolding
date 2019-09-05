<?php

return [
    'appearence' => [
        /*
         * Supported values are black, black-light, blue, blue-light,
         *  green, green-light, purple, purple-light,
         *  red, red-light, yellow and yello-light.
         */
        'skin' => 'blue',
        /*
         * The direction of the dashboard.
         */
        'dir' => 'ltr',
        /*
         * The header items that will be rendered.
         */
        'header' => [
            'items' => [
                'layouts.partials.navbar.languages-bar',
                'adminlte::partials.header.messages',
                'adminlte::partials.header.notifications',
                'adminlte::partials.header.tasks',
                'adminlte::partials.header.user',
            ],
        ],
        /*
         * The sidebar items that will be rendered.
         */
        'sidebar' => [
            'items' => [
                'adminlte::partials.sidebar.user-panel',
                'adminlte::partials.sidebar.search-form',
                'adminlte::partials.sidebar.items',
            ],
        ],
    ],
    'urls' => [
        /*
        |--------------------------------------------------------------------------
        | URLs
        |--------------------------------------------------------------------------
        |
        | Register here your dashboard main urls, base, logout, login, etc...
        | The options that can be nullable is register and password_request meaning that it can be disabled.
        |
        */
        'base'             => '/',
        'logout'           => 'logout',
        'login'            => 'login',
        'register'         => null,
        'password_request' => 'password/reset',
        'password_email'   => 'password/email',
        'password_reset'   => 'password/reset',
    ],
];
