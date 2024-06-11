<?php

return [

    /*
    |--------------------------------------------------------------------------
    | HPE/MicroFocus Monitoring Platform Configuration
    |--------------------------------------------------------------------------
    |
    | This file is for storing the information related to accessing HPE 
    | Ops Bridge API data.   
    |
    */
   
    'omi'      => [
        'host'     => 'emspr01bvwa.healthnow.org',
        'port'     => '80',
        'username' => 'restapi',
        'password' => 'q46rz3983ui_L1Y',
    ],
  
    'sitescope' => [ 
        'host'     => 'sscpr01bvwa.healthnow.org',
        'port'     => '8080',
        'username' => 'restapi',
        'password' => 'q46rz3983ui_L1Y',
     ],

    'tiers'    => [
        'None'  =>  [
            'Windows' => [ ], 
            'Red Hat' => [ ], 
            'AIX'     => [ ], 
            'Palo Alto Firewall' => [ ], 
        ],
        'Core'  => [
            'Windows' => [
                'Ping',
                'Disk Space',
                'Memory Paging',
                'Server Performance',
                'CPU Run Queue',
                'CPU Utilization',
                'Memory Free',
            ],
            'Red Hat'  => [
                'Ping',
                'Memory Free',
                'CPU Utilization',
                'Server Performance',
                'Disk Space',
                'Memory Paging',
            ],
            'AIX'     => [
                'CPU Utilization',
                'Memory Free',
                'Memory Paging',
                'Ping',
                'Disk Space',
                'Server Performance',
            ],
            'Palo Alto Firewall' => [
                'Firewall Availability',
                'Firewall Interfaces',
                'Firewall Resources',
                'Ping',
            ],
        ],
        'Bronze'  =>  [
            'Windows' => [ ], 
            'Red Hat' => [ ], 
            'AIX'     => [ ], 
            'Palo Alto Firewall' => [ ], 
        ],
        'Silver'  =>  [ 
            'Windows' => [ ], 
            'Red Hat' => [ ], 
            'AIX'     => [ ], 
            'Palo Alto Firewall' => [ ], 
        ],
        'Gold'    =>  [ 
            'Windows' => [ ], 
            'Red Hat' => [ ], 
            'AIX'     => [ ], 
            'Palo Alto Firewall' => [ ], 
        ],
    ],
    

];
