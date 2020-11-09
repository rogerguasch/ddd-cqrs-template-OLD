<?php

declare(strict_types=1);

namespace RGR\Crm\Users\Infrastructure\Persistence;

use RGR\Crm\Users\Domain\User;
use RGR\Crm\Users\Domain\UserId;
use RGR\Crm\Users\Domain\UsersRepository;
use RGR\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

class DoctrineUsersRepository extends DoctrineRepository implements UsersRepository
{

    final public function save(User $user): void
    {
        $this->persist($user);
    }

    public function search(UserId $id): ?User
    {
        return $this->repository(User::class)->find($id);
    }
}
