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
            'connection' => [
                'orm_default' => [
                    'params' => [
                        'url' => 'mysql://root:root@mysql/fin',
                    ],
                ],
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