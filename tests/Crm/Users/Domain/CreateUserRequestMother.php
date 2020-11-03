<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users\Domain;

use RGR\Apps\Crm\Controller\Users\Request\CreateUserRequest;

class CreateUserRequestMother
{
    public static function random(): CreateUserRequest
    {
        return self::create(
            UserIdMother::random()->value(),
            UserNameMother::random()->value(),
            UserEmailMother::random()->value()
        );
    }

    public static function create(string $id, string $name, string $email): CreateUserRequest
    {
        return new CreateUserRequest($id, $name, $email);
    }
}
