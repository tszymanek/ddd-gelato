<?php

namespace Production\Domain\Model\Gelato;

use Common\Domain\Model\IdentifiableDomainObject;

class Gelato extends IdentifiableDomainObject
{
    private $gelatoId;
    private $name;
    private $description;
    private $image;

    public function __construct(
        GelatoId $anId,
        $aName,
        $aDescription
    ) {
        $this->gelatoId = $anId;
        $this->name = $aName;
        $this->description = $aDescription;
    }

    public function gelatoId()
    {
        if (null === $this->gelatoId) {
            $this->gelatoId = new GelatoId($this->id());
        }

        return $this->gelatoId;
    }

    public function name()
    {
        return $this->name;
    }

    public function description()
    {
        return $this->description;
    }
}
