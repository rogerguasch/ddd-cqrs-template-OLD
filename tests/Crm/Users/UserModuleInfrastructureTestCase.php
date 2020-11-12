<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users;

use Doctrine\ORM\EntityManager;
use RGR\Crm\Users\Domain\UsersRepository;
use RGR\Crm\Users\Infrastructure\Persistence\DoctrineUsersRepository;
use RGR\Tests\Crm\Shared\Infrastructure\PhpUnit\CrmContextInfrastructureTestCase;

abstract class UserModuleInfrastructureTestCase extends CrmContextInfrastructureTestCase
{
    protected function doctrineRepository(): UsersRepository
    {
//        return $this->service(UsersRepository::class);
        return new DoctrineUsersRepository($this->service(EntityManager::class));
    }
}
