<?php

declare(strict_types=1);

namespace RGR\Crm\Users\Domain;

use RGR\Shared\Domain\Aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    private UserId $id;
    private UserName $name;
    private UserEmail $email;

    public function __construct(UserId $id, UserName $name, UserEmail $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

}
