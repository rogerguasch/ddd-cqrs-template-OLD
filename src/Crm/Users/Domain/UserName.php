<?php

declare(strict_types=1);

namespace RGR\Crm\Users\Domain;

use http\Exception\InvalidArgumentException;
use RGR\Shared\Domain\ValueObject\StringVO;

final class UserName extends StringVO
{
    public function __construct(string $value)
    {
        $this->ensureNameIsMin3Letters($value);
        parent::__construct($value);
    }

    private function ensureNameIsMin3Letters(string $value): void
    {
        if (strlen($value) < 3) {
            throw new InvalidArgumentException('Username min length is 3');
        }
    }
}
