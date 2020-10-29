<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users\Infrastructure;

use PHPUnit\Framework\TestCase;
use RGR\Crm\Users\Domain\User;
use RGR\Crm\Users\Infrastructure\FileUsersRepository;

final class FileUserRepositoryTest extends TestCase
{
    /** @test */
    public function it_should_save_a_user(): void
    {
        $fileUsersRepository = new FileUsersRepository();

        $id = 'some-id';
        $name = 'some-name';
        $email = 'some-email';
        $user = new User($id, $name, $email);

        $fileUsersRepository->save($user);
    }

    /** @test */
    public function it_should_return_an_existing_user(): void
    {
        $fileUsersRepository = new FileUsersRepository();

        $id = 'some-other-id';
        $name = 'some-other_name';
        $email = 'some-other-email';
        $user = new User($id, $name, $email);

        $fileUsersRepository->save($user);

        $this->assertEquals($user, $fileUsersRepository->search($user->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_user(): void
    {
        $fileUsersRepository = new FileUsersRepository();

        $this->assertNull($fileUsersRepository->search('randomId'));
    }
}
