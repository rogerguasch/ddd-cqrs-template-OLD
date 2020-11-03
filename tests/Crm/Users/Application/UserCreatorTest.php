<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users\Application;

use RGR\Crm\Users\Application\UserCreator;
use RGR\Tests\Crm\Users\Domain\UserMother;
use RGR\Tests\Crm\Users\UserModuleUnitTestCase;

final class UserCreatorTest extends UserModuleUnitTestCase
{
    private UserCreator $userCreator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userCreator = new UserCreator($this->repository());
    }

    /** @test */
    public function it_should_create_a_valid_user(): void
    {
        $createUserRequest = CreateUserRequestMother::random();
        $user = UserMother::fromRequest($createUserRequest);

        $this->shouldSave($user);

        $this->userCreator->execute($createUserRequest);
    }

}
