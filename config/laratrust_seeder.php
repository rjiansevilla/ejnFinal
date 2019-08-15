<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrative' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'supervisor' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'Executive' => [
            'users' => 'r',
            'profile' => 'r'
        ],
        'biller' => [
            'profile' => 'r,u'
        ],
        'staff' => [
            'profile' => 'r,u'
        ],
        'collaborator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'client' => [
            'profile' => 'r,u'
        ],
        'provider' => [
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
