<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users\Domain;


use RGR\Crm\Users\Domain\UserName;
use RGR\Tests\Shared\Domain\User\WordMother;

class UserNameMother
{
    public static function random(): UserName
    {
        return self::create(WordMother::random());
    }

    public static function create(string $value): UserName
    {
        return new UserName($value);
    }
}
