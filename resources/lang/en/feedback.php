<?php

return [
    'singular' => 'Contact Us',
    'plural'   => 'Contact Us',
    'unreaded' => 'Unread Messages',
    'empty'    => 'There are no contact us messages.',
    'new'      => 'New',
    'actions'  => [
        'show'   => 'Show',
        'delete' => 'Delete',
        'send'   => 'Send',
    ],
    'messages' => [
        'sent'    => 'The message has been sent successfully',
        'deleted' => 'The message has been deleted successfully',
    ],
    'attributes' => [
        'name'       => 'Name',
        'email'      => 'E-mail',
        'message'    => 'Message',
        'phone'      => 'Phone',
        'readed_at'  => 'Readed at',
        'created_at' => 'Sent at',
    ],
    'dialogs' => [
        'delete' => [
            'title'   => 'Warning !',
            'info'    => 'Are you sure you want to delete the message ?',
            'confirm' => 'Delete',
            'cancel'  => 'Cancel',
        ],
    ],
    'email' => [
        'subject' => ':site',
        'title'   => 'You have new message',
        'more'    => 'Read more',
        'footer'  => 'Thank you for using our application!',
    ],
];
