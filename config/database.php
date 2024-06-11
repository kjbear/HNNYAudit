<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'cognition' => [
            'driver' => 'mysql',
            'host' => env('COGNITION_HOST', '127.0.0.1'),
            'port' => env('COGNITION_PORT', '3306'),
            'database' => env('COGNITION_DATABASE', 'forge'),
            'username' => env('COGNITION_USERNAME', 'forge'),
            'password' => env('COGNITION_PASSWORD', ''),
            'unix_socket' => env('COGNITION_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'override' => [
            'driver' => 'mysql',
            'host' => env('OVERRIDE_HOST', '127.0.0.1'),
            'port' => env('OVERRIDE_PORT', '3306'),
            'database' => env('OVERRIDE_DATABASE', 'forge'),
            'username' => env('OVERRIDE_USERNAME', 'forge'),
            'password' => env('OVERRIDE_PASSWORD', ''),
            'unix_socket' => env('OVERRIDE_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'omi' => [
            'mgmt' => [
                 'driver' => 'sqlsrv',
                 'host' => env('OMI_DB_HOST', 'localhost'),
                 'port' => env('OMI_DB_PORT', '1433'),
                 'database' => 'zdb36q_omi_mgmt_syst',
                 'username' => env('OMI_DB_USERNAME', 'forge'),
                 'password' => env('OMI_DB_PASSWORD', ''),
                 'charset' => 'utf8',
                 'prefix' => '',
            ],
            'rtsm' => [
                 'driver' => 'sqlsrv',
                 'host' => env('OMI_DB_HOST', 'localhost'),
                 'port' => env('OMI_DB_PORT', '1433'),
                 'database' => 'zdb38q_omi_rtsm_syst',
                 'username' => env('OMI_DB_USERNAME', 'forge'),
                 'password' => env('OMI_DB_PASSWORD', ''),
                 'charset' => 'utf8',
                 'prefix' => '',
            ],
            'event' => [
                 'driver' => 'sqlsrv',
                 'host' => env('OMI_DB_HOST', 'localhost'),
                 'port' => env('OMI_DB_PORT', '1433'),
                 'database' => 'zdb39q_omi_event_syst',
                 'username' => env('OMI_DB_USERNAME', 'forge'),
                 'password' => env('OMI_DB_PASSWORD', ''),
                 'charset' => 'utf8',
                 'prefix' => '',
            ],

        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
