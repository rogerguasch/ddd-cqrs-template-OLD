<?php /** @noinspection PhpUnusedLocalVariableInspection */

// rector.php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {

    // get parameters
    $parameters = $containerConfigurator->parameters();

    $parameters->set(
        Option::SYMFONY_CONTAINER_XML_PATH_PARAMETER,
        __DIR__ . '/apps/api//var/cache/dev/CodelyTv_Apps_Api_MoocBackendKernelDevDebugContainer.xml'
    );

    // here we can define, what sets of rules will be applied
    $parameters->set(Option::SETS, [
        SetList::CODE_QUALITY,
        SetList::SYMFONY_50,
        SetList::SYMFONY_50_TYPES,
        SetList::SYMFONY_AUTOWIRE,
        SetList::SYMFONY_CODE_QUALITY,
        SetList::SYMFONY_CONSTRUCTOR_INJECTION,
        SetList::DEAD_CODE,
        SetList::DEAD_CLASSES,
        SetList::TYPE_DECLARATION,
    ]);

    // get services
    $services = $containerConfigurator->services();

    // register single rule
//    $services->set(TypedPropertyRector::class);

};
