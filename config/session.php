<?php

declare(strict_types=1);

use Illuminate\Support\Str;

return [

    // Default Session Driver

    'driver' => env('SESSION_DRIVER', 'file'),

    // Session Lifetime

    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => false,

    // Session Encryption

    'encrypt' => false,

    // Session File Location

    'files' => storage_path('framework/sessions'),

    // Session Database Connection

    'connection' => env('SESSION_CONNECTION'),

    // Session Database Table

    'table' => 'sessions',

    // Session Cache Store

    'store' => env('SESSION_STORE'),

    // Session Sweeping Lottery

    'lottery' => [2, 100],

    // Session Cookie Name

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    // Session Cookie Path

    'path' => '/',

    // Session Cookie Domain

    'domain' => env('SESSION_DOMAIN'),

    // HTTPS Only Cookies

    'secure' => env('SESSION_SECURE_COOKIE'),

    // HTTP Access Only

    'http_only' => true,

    // Same-Site Cookies

    'same_site' => 'lax',

];
