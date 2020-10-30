<?php

declare(strict_types=1);

namespace RGR\Crm\Users\Domain;


final class User
{
    private UserId $id;
    private string $name;
    private string $email;

    public function __construct(UserId $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

}
