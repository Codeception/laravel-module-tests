<?php

declare(strict_types=1);

return [

    // Default Filesystem Disk

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    // Filesystem Disks

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

    ],

    // Symbolic Links

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
