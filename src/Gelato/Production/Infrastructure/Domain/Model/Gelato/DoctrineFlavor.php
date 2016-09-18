<?php

namespace Gelato\Production\Infrastructure\Domain\Model\Gelato;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;
use Gelato\Production\Domain\Model\Gelato\Flavor;

class DoctrineFlavor extends GuidType
{
    public function getName()
    {
        return 'Flavor';
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->name();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Flavor($value);
    }
}
