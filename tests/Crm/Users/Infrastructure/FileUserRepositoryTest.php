<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users\Infrastructure;

use PHPUnit\Framework\TestCase;
use RGR\Crm\Users\Domain\User;
use RGR\Crm\Users\Domain\UserEmail;
use RGR\Crm\Users\Domain\UserId;
use RGR\Crm\Users\Domain\UserName;
use RGR\Crm\Users\Infrastructure\FileUsersRepository;

final class FileUserRepositoryTest extends TestCase
{
    /** @test */
    public function it_should_save_a_user(): void
    {
        $fileUsersRepository = new FileUsersRepository();

        $id = '4a0113c0-781b-4f6c-b383-715e30ad0bb0';
        $name = 'some-name';
        $email = 'some-email';
        $user = new User(
            new UserId($id),
            new UserName($name),
            new UserEmail($email)
        );

        $fileUsersRepository->save($user);
    }

    /** @test */
    public function it_should_return_an_existing_user(): void
    {
        $fileUsersRepository = new FileUsersRepository();

        $id = '6fd17080-568c-4bdb-a4f2-1d4942e2b453';
        $name = 'some-other_name';
        $email = 'some-other-email';
        $user = new User(
            new UserId($id),
            new UserName($name),
            new UserEmail($email)
        );

        $fileUsersRepository->save($user);

        $this->assertEquals($user, $fileUsersRepository->search($user->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_user(): void
    {
        $fileUsersRepository = new FileUsersRepository();

        $this->assertNull($fileUsersRepository->search(new UserId('9aff0ceb-5bfc-4237-abf3-178d105bffa6')));
    }
}
