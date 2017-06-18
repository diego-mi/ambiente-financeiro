<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;

class UsersService {

    /**
     * EntityManeger
     */
    private $entityManager;

    function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

}