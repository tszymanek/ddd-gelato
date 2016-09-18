<?php

namespace Gelato\Sale\Domain\Model\Freezer;

use Doctrine\Common\Collections\ArrayCollection;
use Gelato\Common\Domain\IdentifiableDomainObject;
use Gelato\Production\Domain\Model\Gelato\Gelato;
use Gelato\Production\Domain\Model\Gelato\GelatoId;

class Freezer extends IdentifiableDomainObject
{
    const MAX_CAPACITY = 20;

    protected $freezerId;
    protected $capacity;
    protected $type;
    protected $parlor;
    protected $gelatos;

    public function __construct(
        FreezerId $anId,
        $aParlor,
        FreezerType $aType,
        $aCapacity = null
    ) {
        $this->freezerId = $anId;

        if (!$aCapacity) {
            $this->capacity = self::MAX_CAPACITY;
        } else {
            $this->capacity = $aCapacity;
        }
        $this->type = $aType;
        $this->parlor = $aParlor;
        $this->gelatos = new ArrayCollection();
    }

    public function freezerId()
    {
        if (null === $this->freezerId) {
            $this->freezerId = new FreezerId($this->id());
        }

        return $this->freezerId;
    }

    public function capacity()
    {
        return $this->capacity;
    }

    public function type()
    {
        return $this->type->name();
    }

    public function parlor()
    {
        return $this->parlor;
    }

    public function addGelato(Gelato $gelato)
    {
        if (count($this->gelatos) >= $this->capacity) {
            throw new NoMoreSpaceException();
        }

        $this->gelatos[] = new FreezerGelato(
            $gelato->gelatoId(),
            $gelato->flavor(),
            $gelato->createdAt()
        );
    }

    public function updateGelato(Gelato $gelato, FreezerGelato $freezerGelato)
    {
        $this->gelatos[$freezerGelato->position()] = new FreezerGelato(
            $gelato->gelatoId(),
            $gelato->flavor(),
            $gelato->createdAt()
        );
    }
}
