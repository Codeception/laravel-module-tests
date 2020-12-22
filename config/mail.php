<?php

declare(strict_types=1);

return [

    // Mail Driver

    'driver' => env('MAIL_DRIVER', 'smtp'),

    // SMTP Host Address

    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),

    // SMTP Host Port

    'port' => env('MAIL_PORT', 587),

    // Global "From" Address

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    // E-Mail Encryption Protocol

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    // SMTP Server Username

    'username' => env('MAIL_USERNAME'),

    'password' => env('MAIL_PASSWORD'),

    // Sendmail System Path

    'sendmail' => '/usr/sbin/sendmail -bs',

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
