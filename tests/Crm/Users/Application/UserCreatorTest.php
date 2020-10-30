<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users\Application;

use PHPUnit\Framework\TestCase;
use RGR\Apps\Crm\Controller\Users\Request\CreateUserRequest;
use RGR\Crm\Users\Application\UserCreator;
use RGR\Crm\Users\Domain\User;
use RGR\Crm\Users\Domain\UsersRepository;

final class UserCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_user(): void
    {
        $userRepository = $this->createMock(UsersRepository::class);
        $userCreator = new UserCreator($userRepository);

        $id = 'some-id';
        $name = 'some-name';
        $email = 'some-email';

        $user = new User($id, $name, $email);

        $userRepository->expects($this->once())->method('save')->with($user);

        $createUserRequest = new CreateUserRequest($id, $name, $email);
        $userCreator->execute($createUserRequest);
    }
}
