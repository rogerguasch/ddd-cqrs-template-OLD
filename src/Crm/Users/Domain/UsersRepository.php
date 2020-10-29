<?php

declare(strict_types=1);

namespace RGR\Crm\Users\Domain;

interface UsersRepository
{
    public function save(User $user): void;

    public function search(string $id): ?User;
}
