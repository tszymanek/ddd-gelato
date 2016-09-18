<?php

namespace Gelato\Production\Infrastructure\Domain\Model\Gelato;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;
use Gelato\Production\Domain\Model\Gelato\GelatoId;

class DoctrineGelatoId extends GuidType
{
    public function getName()
    {
        return 'GelatoId';
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->id();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new GelatoId($value);
    }
}
