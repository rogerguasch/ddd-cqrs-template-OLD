<?php

declare(strict_types=1);

namespace RGR\Shared\Infrastructure\Doctrine;

use Doctrine\Common\Cache\ArrayCache;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\MySqlSchemaManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver;
use Doctrine\ORM\Tools\Setup;
use function Lambdish\Phunctional\dissoc;
use RGR\Shared\Infrastructure\Doctrine\Dbal\DbalCustomTypesRegistrar;
use RuntimeException;

final class DoctrineEntityManagerFactory
{
    private static array $sharedPrefixes = [
        __DIR__.'/../../../Shared/Infrastructure/Persistence/Mappings' => 'RGR\Shared\Domain',
    ];

    public static function create(
        array $parameters,
        array $contextPrefixes,
        bool $isDevMode,
        array $dbalCustomTypesClasses
    ): EntityManager {
        if ($isDevMode) {
            static::generateDatabaseIfNotExists($parameters);
        }

        DbalCustomTypesRegistrar::register($dbalCustomTypesClasses);

        return EntityManager::create($parameters, self::createConfiguration($contextPrefixes, $isDevMode));
    }

    private static function generateDatabaseIfNotExists(array $parameters): void
    {
        $databaseName = $parameters['dbname'];
        $parametersWithoutDatabaseName = dissoc($parameters, 'dbname');
        $connection = DriverManager::getConnection($parametersWithoutDatabaseName);
        $schemaManager = new MySqlSchemaManager($connection);

        if (!self::databaseExists($databaseName, $schemaManager)) {
            $schemaManager->createDatabase($databaseName);
            $connection->executeStatement(sprintf('USE %s', $databaseName));
        }

        $connection->close();
    }

    private static function databaseExists($databaseName, MySqlSchemaManager $schemaManager): bool
    {
        return in_array($databaseName, $schemaManager->listDatabases(), true);
    }

    private static function createConfiguration(array $contextPrefixes, bool $isDevMode): Configuration
    {
        $config = Setup::createConfiguration($isDevMode, null, new ArrayCache());

        $config->setMetadataDriverImpl(new SimplifiedXmlDriver(array_merge(self::$sharedPrefixes, $contextPrefixes)));

        return $config;
    }
}
