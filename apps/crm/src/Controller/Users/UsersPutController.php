<?php

declare(strict_types=1);

namespace RGR\Apps\Crm\Controller\Users;

use RGR\Apps\Crm\Controller\Users\Request\CreateUserRequest;
use RGR\Crm\Users\Application\UserCreator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UsersPutController
{

    private UserCreator $userCreator;

    public function __construct(UserCreator $userCreator)
    {
        $this->userCreator = $userCreator;
    }

    public function __invoke(string $id, Request $request): Response
    {
        $createUserRequest = new CreateUserRequest(
            'bd122c01-f874-421b-ab50-60d8208734ca',
            'name',
            'email@email.com'
        );

        $this->userCreator->execute($createUserRequest);

        return new Response('', Response::HTTP_CREATED);
    }
}

