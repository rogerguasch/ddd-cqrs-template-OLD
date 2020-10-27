<?php

declare(strict_types=1);

namespace RGR\Crm\Users\Application;

use RGR\Crm\Users\Domain\User;
use RGR\Crm\Users\Domain\UsersRepository;

final class UserCreator
{
    private UsersRepository $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function execute(string $id, string $name, string $email): void
    {
        $user = new User($id, $name, $email);
        $this->usersRepository->save($user);
    }
}
