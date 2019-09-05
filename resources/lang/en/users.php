<?php

return [
    'singular' => 'User',
    'plural'   => 'Users',
    'empty'    => 'There are no users yet.',
    'count'    => 'Users count',
    'search'   => 'Search',
    'actions'  => [
        'list'    => 'List all',
        'create'  => 'Create User',
        'show'    => 'Show User',
        'edit'    => 'Edit User',
        'delete'  => 'Delete User',
        'options' => 'Options',
        'save'    => 'Save',
    ],
    'messages' => [
        'created' => 'The user has been created successfully.',
        'updated' => 'The user has been updated successfully.',
        'deleted' => 'The user has been deleted successfully.',
    ],
    'attributes' => [
        'name'                  => 'Name',
        'email'                 => 'E-mail',
        'password'              => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'avatar'                => 'Avatar',
    ],
    'placeholders' => [
        'name'                  => 'Write user name',
        'email'                 => 'Write user email',
        'password'              => 'Write user password',
        'password_confirmation' => 'Confirm user password',
    ],
    'notes' => [
        'email'    => 'Ex: name@example.com',
        'password' => 'Passwords must be at least eight characters and match the confirmation.',
    ],
    'dialogs' => [
        'delete' => [
            'title'   => 'Warning !',
            'info'    => 'Are you sure you want to delete the user ?',
            'confirm' => 'Delete',
            'cancel'  => 'Cancel',
        ],
    ],
];
