<?php

namespace Gelato\Production\Domain\Model\Gelato;

class Flavor
{
    /**
     * @var string
     */
    private $name;

    public function __construct($aName)
    {
        $this->name = $aName;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param Flavor $aName
     * @return bool
     */
    public function equalsTo(Flavor $aName)
    {
        return $aName === $this->name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
