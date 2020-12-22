<?php

declare(strict_types=1);

use Illuminate\Support\Str;

return [

    // Default Cache Store

    'default' => env('CACHE_DRIVER', 'file'),

    // Cache Stores

    'stores' => [

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
        ],

    ],

    // Cache Key Prefix

    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache'),

];
