<?php

return [

    'installed' => true,

    'models' => [

        'client' => \App\Containers\Larabeans\Uuider\Models\Client::class,

        'personal_access_client' => \App\Containers\Larabeans\Uuider\Models\PersonalAccessClient::class,
    ],

    // Containers to skip primary key type conversion from auto-increment to uuid
    'ignore_containers' => [

    ],

    // Tables to skip primary key type conversion from auto-increment to uuid
    'ignore_tables' => [

    ]

];
