<?php

declare(strict_types=1);


namespace RGR\Crm\Users\Application;


use RGR\Crm\Users\Domain\Events\UserCreatedDomainEvent;
use RGR\Crm\Users\Domain\UserId;
use RGR\Shared\Domain\Bus\Event\DomainEventSubscriber;

class IncrementUsersCounterOnUserCreated implements DomainEventSubscriber
{

    public static function subscribedTo(): array
    {
        return [UserCreatedDomainEvent::class];
    }

    public function execute(UserCreatedDomainEvent $event): void
    {
        $userId = new UserId($event->aggregateId());

        echo 'User with id ' . $userId->value() . 'created!. Please check the database...';
    }
}
