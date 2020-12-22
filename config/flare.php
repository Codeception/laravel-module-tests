<?php

return [

    // Flare API key

    'key' => env('FLARE_KEY'),

    // Reporting Options

    'reporting' => [
        'anonymize_ips' => true,
        'collect_git_information' => false,
        'report_queries' => true,
        'maximum_number_of_collected_queries' => 200,
        'report_query_bindings' => true,
        'report_view_data' => true,
        'grouping_type' => null,
    ],

    // Reporting Log statements

    'send_logs_as_events' => true,
];
