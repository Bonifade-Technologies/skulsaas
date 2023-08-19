<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadmin' => [
            'tenant' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'years' => 'c,r,u,d',
            'terms' => 'c,r,u,d',
            'school type' => 'c,r,u,d',
            'level' => 'c,r,u,d',
            'sections' => 'c,r,u,d',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'years' => 'c,r,u,d',
            'terms' => 'c,r,u,d',
            'level' => 'c,r,u,d',
            'sections' => 'c,r,u,d',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];