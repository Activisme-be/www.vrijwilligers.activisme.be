<?php

return [
    '2fa' => [
        'enabled' => true,
    ],

    /**
     * -----------------------------------------------------------------------------
     * Default data (Database seeds)
     * -----------------------------------------------------------------------------
     *
     * The default data that is used throughout the datebase seeders.
     *
     */

    'default' => [

        /**
         * The default users trogh the seeds. only the First and lastname is required because the other data is filled up with the
         * Default pass that is 'pasword'. And your email is in the follwoing format. <firstname>@<application mail domain>
         */

        'users' => [
            ['Tim', 'Joosten'], ['Sara', 'Landuyt'], ['Tom', 'Manheaghe']
        ]

    ]
];
