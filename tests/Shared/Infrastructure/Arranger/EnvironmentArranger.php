<?php

declare(strict_types=1);

namespace RGR\Tests\Shared\Infrastructure\Arranger;

interface EnvironmentArranger
{
    public function arrange(): void;

    public function close(): void;

    public function open(): void;
}
