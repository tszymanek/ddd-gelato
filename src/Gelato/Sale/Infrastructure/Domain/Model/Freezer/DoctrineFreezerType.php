<?php

namespace Gelato\Sale\Infrastructure\Domain\Model\Freezer;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;
use Gelato\Sale\Domain\Model\Freezer\FreezerType;

class DoctrineFreezerType extends GuidType
{
    public function getName()
    {
        return 'FreezerType';
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->name();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new FreezerType($value);
    }
}
