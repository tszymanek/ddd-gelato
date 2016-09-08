<?php

namespace Gelato\Production\Infrastructure\Domain\Model\Craftsman;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanId;

class DoctrineCraftsmanId extends GuidType
{
    public function getName()
    {
        return 'CraftsmanId';
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->id();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new CraftsmanId($value);
    }
}
