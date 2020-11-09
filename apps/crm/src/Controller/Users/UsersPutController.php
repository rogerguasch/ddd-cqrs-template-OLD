<?php

declare(strict_types=1);

namespace RGR\Apps\Crm\Controller\Users;

use RGR\Apps\Crm\Controller\Users\Request\CreateUserRequest;
use RGR\Crm\Users\Application\UserCreator;
use RGR\Crm\Users\Domain\UserId;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Uid\Uuid;

final class UsersPutController
{

    private UserCreator $userCreator;

    public function __construct(UserCreator $userCreator)
    {
        $this->userCreator = $userCreator;
    }

    public function __invoke(Request $request): Response
    {
        $createUserRequest = new CreateUserRequest(
            '6e178b0c-8b07-4d04-b380-5d6cfad091f5',
            $request->get('name'),
            $request->get('email'),
        );

        $this->userCreator->execute($createUserRequest);

        return new Response('', Response::HTTP_CREATED);
    }
}

