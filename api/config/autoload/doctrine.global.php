<?php

use ContainerInteropDoctrine\EntityManagerFactory;

return [
    'dependencies' => [
        'factories' => [
            'doctrine.entity_manager.orm_default' => EntityManagerFactory::class,
        ],
    ],

    /**
     * For full configuration options, see
     * https://github.com/DASPRiD/container-interop-doctrine/blob/master/example/full-config.php
     *
     * Host in docker = name of container
     * Host without docker = localhost
     */
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => [
                    'host'     => 'mysql',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => 'root',
                    'dbname'   => 'fin',
                    'unix_socket' => '/var/run/mysqld/mysqld.sock'
                ]
            ],
        ],
        'driver' => [
            'orm_default' => [
                'class' => \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain::class,
                'drivers' => [
                    'App\Entity' => 'my_entity',
                ],
            ],
            'my_entity' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => 'src/App/Entity/',
            ],
        ],
    ],
];