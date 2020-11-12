<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Shared\Infrastructure\PhpUnit;

use RGR\Tests\Shared\Infrastructure\Arranger\EnvironmentArranger;
use RGR\Tests\Shared\Infrastructure\Doctrine\MySqlDatabaseCleaner;
use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;

final class CrmEnvironmentArranger implements EnvironmentArranger
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function arrange(): void
    {
        apply(new MySqlDatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {
    }
}
