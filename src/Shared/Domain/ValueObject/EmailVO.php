<?php

declare(strict_types=1);

namespace RGR\Shared\Domain\ValueObject;

use Assert\Assertion;

abstract class EmailVO
{
    protected string $value;

    public function __construct(string $value)
    {
        Assertion::email($value);
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value();
    }

    public function value(): string
    {
        return $this->value;
    }
}
