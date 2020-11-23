<?php

declare(strict_types=1);

namespace RGR\Apps\Crm\Controller\Users;

use RGR\Apps\Crm\Controller\Users\Request\CreateUserRequest;
use RGR\Crm\Users\Application\UserCreator;
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
            Uuid::v4()->toRfc4122(),
            $request->get('name'),
            $request->get('email'),
        );

        $this->userCreator->__invoke($createUserRequest);

        return new Response('', Response::HTTP_CREATED);
    }
}

