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

    ],

];
