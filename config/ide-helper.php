<?php

declare(strict_types=1);

return [

    // Filename & Format

    'filename'  => '_ide_helper.php',

    //Where to write the PhpStorm specific meta file

    'meta_filename' => '.phpstorm.meta.php',

    // Fluent helpers

    'include_fluent' => false,

    // Factory Builders

    'include_factory_builders' => false,

    // Write Model Magic methods

    'write_model_magic_where' => true,

    // Write Model External Eloquent Builder methods

    'write_model_external_builder_methods' => true,

    // Write Model relation count properties

    'write_model_relation_count_properties' => true,

    // Write Eloquent Model Mixins

    'write_eloquent_model_mixins' => false,

    // Helper files to include

    'include_helpers' => false,

    'helper_files' => [
        base_path() . '/vendor/laravel/framework/src/Illuminate/Support/helpers.php',
    ],

    // Model locations to include

    'model_locations' => [
        'app',
    ],

    // Models to ignore

    'ignored_models' => [

    ],

    // Extra classes

    'extra' => [
        'Eloquent' => [\Illuminate\Database\Eloquent\Builder::class, \Illuminate\Database\Query\Builder::class],
        'Session' => [\Illuminate\Session\Store::class],
    ],

    'magic' => [],

    // Interface implementations

    'interfaces' => [

    ],

    // Support for custom DB types

    'custom_db_types' => [

    ],

    // Support for camel cased models

    'model_camel_case_properties' => false,

    // Property Casts

    'type_overrides' => [
        'integer' => 'int',
        'boolean' => 'bool',
    ],

    // Include DocBlocks from classes

    'include_class_docblocks' => false,

    // Force FQN usage

    'force_fqn' => false,

    // Additional relation types

    'additional_relation_types' => [],
];
