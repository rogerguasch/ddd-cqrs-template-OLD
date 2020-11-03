<?php

declare(strict_types=1);

namespace RGR\Crm\Users\Domain;


use InvalidArgumentException;
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
        if (strlen($value) > 30) {
            throw new InvalidArgumentException('Username max length is 30');
        }
    }
}
