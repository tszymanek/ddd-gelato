<?php

namespace Gelato\Sale\Infrastructure\Domain\Model\Freezer;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;
use Gelato\Sale\Domain\Model\Freezer\FreezerId;

class DoctrineFreezerId extends GuidType
{
    public function getName()
    {
        return 'FreezerId';
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->id();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new FreezerId($value);
    }
}
