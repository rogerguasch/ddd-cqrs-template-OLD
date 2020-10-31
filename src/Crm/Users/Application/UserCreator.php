<?php

declare(strict_types=1);

namespace RGR\Crm\Users\Application;

use RGR\Apps\Crm\Controller\Users\Request\CreateUserRequest;
use RGR\Crm\Users\Domain\User;
use RGR\Crm\Users\Domain\UserEmail;
use RGR\Crm\Users\Domain\UserId;
use RGR\Crm\Users\Domain\UserName;
use RGR\Crm\Users\Domain\UsersRepository;

final class UserCreator
{
    private UsersRepository $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function execute(CreateUserRequest $createUserRequest): void
    {
        $user = new User(
            new UserId($createUserRequest->id()),
            new UserName($createUserRequest->name()),
            new UserEmail($createUserRequest->email())
        );

        $this->usersRepository->save($user);
    }
}
