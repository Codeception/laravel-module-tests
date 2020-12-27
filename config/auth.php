<?php

declare(strict_types=1);

use App\Models\User;

return [

    //Authentication Defaults

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    //Authentication Guards

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    // User Providers

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => User::class,
        ],
    ],

    // Resetting Passwords

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    // Password Confirmation Timeout

    'password_timeout' => 10800,

];
