<?php

declare(strict_types=1);

namespace RGR\Tests\Shared\Domain\User;

final class WordMother
{
    public static function random(): string
    {
        return MotherCreator::random()->word;
    }
}
