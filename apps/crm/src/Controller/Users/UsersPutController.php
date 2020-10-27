<?php

declare(strict_types=1);

namespace RGR\Apps\Crm\Controller\Users;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UsersPutController
{
    public function __invoke(string $id, Request $request): Response
    {
        return new JsonResponse('', 201);
    }
}

