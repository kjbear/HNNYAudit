<?php

return [

    /*
    |--------------------------------------------------------------------------
    | InfluxDB Settings
    |--------------------------------------------------------------------------
    |
    | This file contains info that is used to connect and manage data in
    |  a InfluxDB database.  Information from the following page has
    |  been used in creating this integration.
    |
    |  https://docs.influxdata.com/influxdb/v1.6/guides/writing_data/ 
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Feature enable/disable
    |--------------------------------------------------------------------------
    |
    | Section allows for various things to be enabled or disabled.
    |   
    |    global:	Enables the integration
    |    dev:		Enables ingestion of "dev" tagged events
    |    prod:		Enables ingestion of "prod" tagged events
    |
    */

    'enabled' => [
        'gobal'      => true,
        'dev'        => true,
        'prod'       => true
    ],

    'server' =>  [
        'name'       => 'emsd103bvla.healthnow.org',
        'port'       => '8086'

    ],
];
