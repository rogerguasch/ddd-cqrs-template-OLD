<?php

declare(strict_types=1);

namespace RGR\Apps\Crm\Controller\Users;

use RGR\Apps\Crm\Controller\Users\Request\CreateUserRequest;
use RGR\Crm\Users\Application\UserCreator;
use RGR\Shared\Domain\UuidGenerator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UsersPutController
{

    private UserCreator $userCreator;
    private UuidGenerator $uuidGenerator;

    public function __construct(UserCreator $userCreator, UuidGenerator $uuidGenerator)
    {
        $this->userCreator = $userCreator;
        $this->uuidGenerator = $uuidGenerator;
    }

    public function __invoke(Request $request): Response
    {
        $createUserRequest = new CreateUserRequest(
            $this->uuidGenerator->generate(),
            $request->get('name'),
            $request->get('email'),
        );

        $this->userCreator->__invoke($createUserRequest);

        return new Response('', Response::HTTP_CREATED);
    }
}

