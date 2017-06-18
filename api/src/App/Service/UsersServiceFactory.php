<?php

namespace App\Service;

use Interop\Container\ContainerInterface;

class UsersServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $em = $container->get('doctrine.entity_manager.orm_default');

        return new UsersService($em);
    }
}