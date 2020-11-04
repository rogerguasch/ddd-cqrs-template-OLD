<?php

declare(strict_types=1);

namespace RGR\Shared\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use RGR\Shared\Domain\Utils;
use RGR\Shared\Domain\ValueObject\UuidVo;
use RGR\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;
use function Lambdish\Phunctional\last;

abstract class UuidType extends StringType implements DoctrineCustomType
{
    public function getName(): string
    {
        return self::customTypeName();
    }

    public static function customTypeName(): string
    {
        return Utils::toSnakeCase(str_replace('Type', '', last(explode('\\', static::class))));
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $className = $this->typeClassName();

        return new $className($value);
    }

    abstract protected function typeClassName(): string;

    /** @var UuidVo */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->value();
    }
}
