<?php

namespace Gelato\Sale\Domain\Model\Freezer;

class FreezerType
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
     * @param FreezerType $aName
     * @return bool
     */
    public function equalsTo(FreezerType $aName)
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
