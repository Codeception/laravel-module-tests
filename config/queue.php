<?php

declare(strict_types=1);

return [

    // Default Queue Connection Name

    'default' => env('QUEUE_CONNECTION', 'sync'),

    // Queue Connections

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

    ],

    // Failed Queue Jobs

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'failed_jobs',
    ],

];
