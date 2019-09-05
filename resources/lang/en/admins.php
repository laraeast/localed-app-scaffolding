<?php

return [
    'singular' => 'Admin',
    'plural'   => 'Admins',
    'empty'    => 'There are no admins yet.',
    'count'    => 'Admins count',
    'search'   => 'Search',
    'actions'  => [
        'list'    => 'List all',
        'create'  => 'Create Admin',
        'show'    => 'Show Admin',
        'edit'    => 'Edit Admin',
        'delete'  => 'Delete Admin',
        'options' => 'Options',
        'save'    => 'Save',
    ],
    'messages' => [
        'created' => 'The admin has been created successfully.',
        'updated' => 'The admin has been updated successfully.',
        'deleted' => 'The admin has been deleted successfully.',
    ],
    'attributes' => [
        'name'                  => 'Name',
        'email'                 => 'E-mail',
        'password'              => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'avatar'                => 'Avatar',
    ],
    'placeholders' => [
        'name'                  => 'Write admin name',
        'email'                 => 'Write admin email',
        'password'              => 'Write admin password',
        'password_confirmation' => 'Confirm admin password',
    ],
    'notes' => [
        'email'    => 'Ex: name@example.com',
        'password' => 'Passwords must be at least eight characters and match the confirmation.',
    ],
    'dialogs' => [
        'delete' => [
            'title'   => 'Warning !',
            'info'    => 'Are you sure you want to delete the admin ?',
            'confirm' => 'Delete',
            'cancel'  => 'Cancel',
        ],
    ],
];
