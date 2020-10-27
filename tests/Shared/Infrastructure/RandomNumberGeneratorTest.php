<?php

namespace App\Tests\Shared\Infrastructure;

use PHPUnit\Framework\TestCase;
use RGR\Shared\Infrastructure\RandomNumberGenerator;

class RandomNumberGeneratorTest extends TestCase
{

    /** @test */
    final public function it_should_generate_a_random_number(): void
    {
        $generator = new RandomNumberGenerator();
        self::assertIsNumeric($generator->generate());
    }
}
