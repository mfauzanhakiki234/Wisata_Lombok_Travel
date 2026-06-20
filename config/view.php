<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views.
    |
    */
    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, you may customize this value as needed.
    |
    */
    'compiled' => env('VIEW_COMPILED_PATH', storage_path('framework/views')),

    'cache' => env('VIEW_CACHE', true),

    'relative_hash' => env('VIEW_RELATIVE_HASH', false),

    'compiled_extension' => env('VIEW_COMPILED_EXTENSION', 'php'),

    'check_cache_timestamps' => env('VIEW_CHECK_CACHE_TIMESTAMPS', true),
];
