<?php

declare(strict_types=1);

return [

    // Default Hash Driver

    'driver' => 'argon2id',

    // Argon Options

    'argon' => [
        'memory' => 1024,
        'threads' => 2,
        'time' => 2,
    ],

];
