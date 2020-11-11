<?php

declare(strict_types=1);

namespace RGR\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Symfony\Component\Uid\Uuid;

abstract class UuidVo
{
    private string $uuid;

    final public function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);
        $this->uuid = $value;
    }

    private function ensureIsValidUuid(string $uuid): void
    {
        if (!Uuid::isValid($uuid)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $uuid));
        }
    }

    public static function random(): self
    {
        return new static(Uuid::v4());
    }

    public function equals(UuidVo $other): bool
    {
        return $this->value() === $other->value();
    }

    public function value(): string
    {
        return $this->uuid;
    }

    public function __toString(): string
    {
        return $this->value();
    }
}
