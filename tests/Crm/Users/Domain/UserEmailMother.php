<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users\Domain;


use RGR\Crm\Users\Domain\UserEmail;
use RGR\Tests\Shared\Domain\User\EmailMother;

class UserEmailMother
{
    public static function random(): UserEmail
    {
        return self::create(EmailMother::random());
    }

    public static function create(string $value): UserEmail
    {
        return new UserEmail($value);
    }
}
