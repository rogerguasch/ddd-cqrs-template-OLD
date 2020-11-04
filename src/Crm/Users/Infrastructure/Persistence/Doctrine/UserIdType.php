<?php

declare(strict_types=1);

namespace RGR\Crm\Users\Infrastructure\Persistence\Doctrine;

use RGR\Crm\Users\Domain\UserId;
use RGR\Shared\Infrastructure\Persistence\Doctrine\UuidType;


final class UserIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return UserId::class;
    }
}
