<?php

declare(strict_types=1);

namespace RGR\Crm\Users\Infrastructure;

use RGR\Crm\Users\Domain\User;
use RGR\Crm\Users\Domain\UserId;
use RGR\Crm\Users\Domain\UsersRepository;

class FileUsersRepository implements UsersRepository
{
    private const FILE_PATH = __DIR__ . '/users';

    public function save(User $user): void
    {
        file_put_contents(
            $this->fileName($user->id()->value()),
            serialize($user)
        );
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }

    public function search(UserId $id): ?User
    {
        return file_exists($this->fileName($id->value()))
            ? unserialize(file_get_contents($this->fileName($id->value())), [true])
            : null;
    }
}
