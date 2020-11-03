<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users\Application;

use PHPUnit\Framework\TestCase;
use RGR\Crm\Users\Application\UserCreator;
use RGR\Crm\Users\Domain\UsersRepository;
use RGR\Tests\Crm\Users\Domain\CreateUserRequestMother;
use RGR\Tests\Crm\Users\Domain\UserMother;

final class UserCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_user(): void
    {
        $userRepository = $this->createMock(UsersRepository::class);
        $userCreator = new UserCreator($userRepository);

        $createUserRequest = CreateUserRequestMother::random();
        $user = UserMother::fromRequest($createUserRequest);

        $userRepository->method('save')->with($user);

        $userCreator->execute($createUserRequest);
    }
}
