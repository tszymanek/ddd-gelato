<?php

namespace Gelato\Production\Domain\Model\Gelato;

class Flavor
{
    private $name;

    public function __construct(
        $aName
    ) {
        $this->name = $aName;
    }

    public function name()
    {
        return $this->name;
    }

    public function equalsTo(Flavor $aName)
    {
        return $aName === $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }
}
