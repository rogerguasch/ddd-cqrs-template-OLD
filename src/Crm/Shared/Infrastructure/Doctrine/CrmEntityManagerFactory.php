<?php

declare(strict_types=1);

namespace RGR\Crm\Shared\Infrastructure\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use RGR\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;

final class CrmEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__.'/../../../../../docker/etc/database/crm.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__.'/../../../../Crm', 'RGR\Crm'),
        );

        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(__DIR__.'/../../../../Crm', 'Crm');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}
