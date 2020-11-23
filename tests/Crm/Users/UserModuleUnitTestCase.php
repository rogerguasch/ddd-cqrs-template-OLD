<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use RGR\Crm\Users\Domain\User;
use RGR\Crm\Users\Domain\UsersRepository;
use RGR\Shared\Domain\Bus\Event\EventBus;

abstract class UserModuleUnitTestCase extends TestCase
{
    private $userRepository;
    private $eventBus;

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

    /**
     * @return MockObject | EventBus
     */
    protected function eventBus(): MockObject
    {
        return $this->eventBus = $this->eventBus ?: $this->createMock(EventBus::class);
    }
}
