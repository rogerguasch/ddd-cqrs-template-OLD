<?php

declare(strict_types=1);

namespace RGR\Tests\Shared\Domain\User;


final class UuidMother
{
    public static function random(): string
    {
        return MotherCreator::random()->unique()->uuid;
    }
}
