<?php

declare(strict_types=1);

use Facade\Ignition\SolutionProviders\MissingPackageSolutionProvider;

return [

    // Editor

    'editor' => env('IGNITION_EDITOR', 'phpstorm'),

    // Theme

    'theme' => env('IGNITION_THEME', 'dark'),

    // Sharing

    'enable_share_button' => env('IGNITION_SHARING_ENABLED', false),

    // Register Ignition commands

    'register_commands' => env('REGISTER_IGNITION_COMMANDS', false),

    // Ignored Solution Providers

    'ignored_solution_providers' => [
        MissingPackageSolutionProvider::class,
    ],

    // Runnable Solutions

    'enable_runnable_solutions' => env('IGNITION_ENABLE_RUNNABLE_SOLUTIONS'),

    // Remote Path Mapping

    'remote_sites_path' => env('IGNITION_REMOTE_SITES_PATH', ''),
    'local_sites_path' => env('IGNITION_LOCAL_SITES_PATH', ''),

    // Housekeeping Endpoint Prefix

    'housekeeping_endpoint_prefix' => '_ignition',

];
