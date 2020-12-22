<?php

declare(strict_types=1);

return [

    // Debugbar Settings

    'enabled' => env('DEBUGBAR_ENABLED'),
    'except' => [
        'telescope*',
        'horizon*',
    ],

    // Storage settings

    'storage' => [
        'enabled'    => true,
        'driver'     => 'file', // redis, file, pdo, custom
        'path'       => storage_path('debugbar'), // For file driver
        'connection' => null,   // Leave null for default connection (Redis/PDO)
        'provider'   => '', // Instance of StorageInterface for custom driver
    ],

    // Vendors

    'include_vendors' => true,

    // Capture Ajax Requests

    'capture_ajax' => true,
    'add_ajax_timing' => false,

    // Custom Error Handler for Deprecated warnings

    'error_handler' => false,

    // Clockwork integration

    'clockwork' => false,

    // DataCollectors

    'collectors' => [
        'phpinfo'         => true,  // Php version
        'messages'        => true,  // Messages
        'time'            => true,  // Time Datalogger
        'memory'          => true,  // Memory usage
        'exceptions'      => true,  // Exception displayer
        'log'             => true,  // Logs from Monolog (merged in messages if enabled)
        'db'              => true,  // Show database (PDO) queries and bindings
        'views'           => true,  // Views with their data
        'route'           => true,  // Current route information
        'auth'            => false, // Display Laravel authentication status
        'gate'            => true,  // Display Laravel Gate checks
        'session'         => true,  // Display session data
        'symfony_request' => true,  // Only one can be enabled..
        'mail'            => true,  // Catch mail messages
        'laravel'         => false, // Laravel version and environment
        'events'          => false, // All events fired
        'default_request' => false, // Regular or special Symfony request logger
        'logs'            => false, // Add the latest log messages
        'files'           => false, // Show the included files
        'config'          => false, // Display config settings
        'cache'           => false, // Display cache events
        'models'          => true,  // Display models
        'livewire'        => true,  // Display Livewire (when available)
    ],

    // Extra options

    'options' => [
        'auth' => [
            'show_name' => true,
        ],
        'db' => [
            'with_params'       => true,
            'backtrace'         => true,
            'backtrace_exclude_paths' => [],
            'timeline'          => false,
            'explain' => [
                'enabled' => false,
                'types' => ['SELECT'],
            ],
            'hints'             => true,
            'show_copy'         => false,
        ],
        'mail' => [
            'full_log' => false,
        ],
        'views' => [
            'data' => false,
        ],
        'route' => [
            'label' => true,
        ],
        'logs' => [
            'file' => null,
        ],
        'cache' => [
            'values' => true,
        ],
    ],

    // Inject Debugbar in Response

    'inject' => true,

    // DebugBar route prefix

    'route_prefix' => '_debugbar',

    // DebugBar route domain

    'route_domain' => null,

    // DebugBar theme

    'theme' => 'dark',
];
