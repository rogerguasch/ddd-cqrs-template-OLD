<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users\Application;

use RGR\Apps\Crm\Controller\Users\Request\CreateUserRequest;
use RGR\Tests\Crm\Users\Domain\UserEmailMother;
use RGR\Tests\Crm\Users\Domain\UserIdMother;
use RGR\Tests\Crm\Users\Domain\UserNameMother;

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
