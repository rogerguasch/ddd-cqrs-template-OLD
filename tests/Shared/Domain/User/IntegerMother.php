<?php

declare(strict_types=1);

namespace RGR\Tests\Shared\Domain\User;

final class IntegerMother
{
    public static function lessThan(int $max): int
    {
        return self::between(1, $max);
    }

    public static function between(int $min, int $max = PHP_INT_MAX): int
    {
        return MotherCreator::random()->numberBetween($min, $max);
    }

    public static function moreThan(int $min): int
    {
        return self::between($min);
    }

    public static function random(): int
    {
        return self::between(1);
    }
}
