<?php

declare(strict_types=1);

return [

    // Default Database Connection Name

    'default' => env('DB_CONNECTION', 'sqlite'),

    // Database Connections

    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],
    ],

    // Migration Repository Table

    'migrations' => 'migrations',
];
