<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use RGR\Crm\Users\Domain\User;
use RGR\Crm\Users\Domain\UsersRepository;

abstract class UserModuleUnitTestCase extends TestCase
{
    private $userRepository;

    /**
     * @return MockObject | UsersRepository
     */
    protected function repository(): MockObject
    {
        return $this->userRepository = $this->userRepository ?: $this->createMock(UsersRepository::class);
    }

    protected function shouldSave(User $user): void
    {
        $this->userRepository->method('save')->with($user);
    }
}
