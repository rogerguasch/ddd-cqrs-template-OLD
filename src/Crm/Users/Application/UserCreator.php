<?php

declare(strict_types=1);

namespace RGR\Crm\Users\Application;

use RGR\Apps\Crm\Controller\Users\Request\CreateUserRequest;
use RGR\Crm\Users\Domain\User;
use RGR\Crm\Users\Domain\UserEmail;
use RGR\Crm\Users\Domain\UserId;
use RGR\Crm\Users\Domain\UserName;
use RGR\Crm\Users\Domain\UsersRepository;
use RGR\Shared\Domain\Bus\Event\EventBus;

final class UserCreator
{
    private UsersRepository $usersRepository;
    private EventBus $eventBus;

    public function __construct(UsersRepository $usersRepository, EventBus $eventBus)
    {
        $this->usersRepository = $usersRepository;
        $this->eventBus = $eventBus;
    }

    public function execute(CreateUserRequest $createUserRequest): void
    {
        $user = User::create(
            new UserId($createUserRequest->id()),
            new UserName($createUserRequest->name()),
            new UserEmail($createUserRequest->email())
        );

        $this->usersRepository->save($user);
        $this->eventBus->publish($user->pullDomainEvents());
    }
}
