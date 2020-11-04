<?php

declare(strict_types=1);


namespace RGR\Shared\Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\EntityManager;

abstract class DoctrineRepository
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    protected function entityManager(): EntityManager
    {
        return $this->entityManager;
    }


}
