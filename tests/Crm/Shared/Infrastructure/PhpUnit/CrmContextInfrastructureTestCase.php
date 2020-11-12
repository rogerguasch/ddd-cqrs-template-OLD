<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Shared\Infrastructure\PhpUnit;

use Doctrine\ORM\EntityManager;
use RGR\Apps\Crm\CrmKernel;
use RGR\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;

abstract class CrmContextInfrastructureTestCase extends InfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $arranger = new CrmEnvironmentArranger($this->service(EntityManager::class));

        $arranger->open();

        $arranger->arrange();
    }

    protected function tearDown(): void
    {
        $arranger = new CrmEnvironmentArranger($this->service(EntityManager::class));

        $arranger->close();

        parent::tearDown();
    }

    protected function kernelClass(): string
    {
        return CrmKernel::class;
    }
}
