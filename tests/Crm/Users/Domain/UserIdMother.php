<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users\Domain;

use RGR\Crm\Users\Domain\UserId;
use RGR\Tests\Shared\Domain\User\UuidMother;


class UserIdMother
{
    public static function create(string $value): UserId
    {
        return new UserId($value);
    }

    public static function creator(): callable
    {
        return static fn () => self::random();
    }

    public static function random(): UserId
    {
        return self::create(UuidMother::random());
    }
}
