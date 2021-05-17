<?php

return [

    'models' => [

        'user' => \App\Containers\Vendor\Uuider\Models\User::class,

        'permission' => \App\Containers\Vendor\Uuider\Models\Permission::class,

        'role' => \App\Containers\Vendor\Uuider\Models\Role::class,
    ],

    // Containers to skip primary key type conversion from auto-increment to uuid
    'ignore_containers' => [

    ],

    // Tables to skip primary key type conversion from auto-increment to uuid
    'ignore_tables' => [

    ]

];
