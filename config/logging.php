<?php

declare(strict_types=1);

return [

    // Default Log Channel

    'default' => env('LOG_CHANNEL', 'stack'),

    // Log Channels

    'channels' => [

        'stack' => [
            'driver' => 'stack',
            'channels' => ['single'],
            'ignore_exceptions' => false,
        ],
        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
        ],

    ],

];
