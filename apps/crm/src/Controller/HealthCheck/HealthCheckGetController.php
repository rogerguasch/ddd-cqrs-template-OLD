<?php

declare(strict_types = 1);

namespace RGR\Apps\Crm\Controller\HealthCheck;

use RGR\Shared\Infrastructure\RandomNumberGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class HealthCheckGetController
{
    private RandomNumberGenerator $generator;

    public function __construct(RandomNumberGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function __invoke(Request $request): Response
    {
        return new JsonResponse(
            [
                'crm' => 'ok',
                'rand' => $this->generator->generate(),
            ]
        );
    }
}
