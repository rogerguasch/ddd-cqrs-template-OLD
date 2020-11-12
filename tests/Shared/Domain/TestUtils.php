<?php

declare(strict_types=1);

namespace RGR\Tests\Shared\Domain;

//use RGR\Tests\Shared\Infrastructure\Mockery\RGRMatcherIsSimilar;
use RGR\Tests\Shared\Infrastructure\PhpUnit\Constraint\RGRConstraintIsSimilar;

final class TestUtils
{
    public static function isSimilar($expected, $actual): bool
    {
        $constraint = new RGRConstraintIsSimilar($expected);

        return $constraint->evaluate($actual, '', true);
    }

    public static function assertSimilar($expected, $actual): void
    {
        $constraint = new RGRConstraintIsSimilar($expected);

        $constraint->evaluate($actual);
    }

//    public static function similarTo($value, $delta = 0.0): RGRMatcherIsSimilar
//    {
//        return new RGRMatcherIsSimilar($value, $delta);
//    }
}
