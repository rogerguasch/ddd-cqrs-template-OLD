<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users\Domain;


use RGR\Apps\Crm\Controller\Users\Request\CreateUserRequest;
use RGR\Crm\Users\Domain\User;
use RGR\Crm\Users\Domain\UserEmail;
use RGR\Crm\Users\Domain\UserId;
use RGR\Crm\Users\Domain\UserName;

class UserMother
{
    public static function random(): User
    {
        return self::create(
            UserIdMother::random(),
            UserNameMother::random(),
            UserEmailMother::random()
        );
    }

    public static function create(UserId $id, UserName $name, UserEmail $email): User
    {
        return new User($id, $name, $email);
    }

    public static function fromRequest(CreateUserRequest $createUserRequest): User
    {
        return self::create(
            UserIdMother::create($createUserRequest->id()),
            UserNameMother::create($createUserRequest->name()),
            UserEmailMother::create($createUserRequest->email()),
        );
    }

}
