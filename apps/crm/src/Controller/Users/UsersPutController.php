<?php

declare(strict_types=1);

namespace RGR\Apps\Crm\Controller\Users;

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
        $name = $request->get('name');
        $email = $request->get('email');

        $this->userCreator->execute($id, $name, $email);

        return new Response('', Response::HTTP_CREATED);
    }
}

