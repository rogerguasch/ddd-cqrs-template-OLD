<?php


namespace RGR\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Symfony\Component\Uid\Uuid as SymfonyUuid;

abstract class Uuid
{
    private string $uuid;

    public function __construct(string $uuid)
    {
        $this->ensureIsValidUuid($uuid);
        $this->uuid = $uuid;
    }

    private function ensureIsValidUuid(string $uuid): void
    {
        if (!SymfonyUuid::isValid($uuid)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $uuid));
        }
    }

    public static function random(): self
    {
        return new static(SymfonyUuid::v4());
    }

    public function equals(Uuid $other): bool
    {
        return $this->uuid() === $other->uuid();
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public function __toString(): string
    {
        return $this->uuid();
    }
}
