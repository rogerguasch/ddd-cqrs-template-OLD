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
            $id,
            $name = $request->request->get('name'),
            $email = $request->request->get('email')
        );

        $this->userCreator->execute($createUserRequest);

        return new Response('', Response::HTTP_CREATED);
    }
}

