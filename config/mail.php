<?php

declare(strict_types=1);

return [

    // Mail Driver

    'driver' => env('MAIL_DRIVER', 'log'),

    // Global "From" Address

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    // Markdown Mail Settings

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

    // Log Channel

    'log_channel' => env('MAIL_LOG_CHANNEL'),

];
