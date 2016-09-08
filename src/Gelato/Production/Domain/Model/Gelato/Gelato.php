<?php

namespace Gelato\Production\Domain\Model\Gelato;

use Gelato\Common\Domain\IdentifiableDomainObject;

class Gelato extends IdentifiableDomainObject {
    private $gelatoId;
    private $craftsmanId;
    private $gelatoFlavor;
    private $createdAt;

    public function __construct(
        GelatoId $anId,
        Flavor $aGelatoFlavor,
        CraftsmanId $aCraftsmanId
    )
    {
        $this->gelatoId = $anId;
        $this->gelatoFlavor = $aGelatoFlavor;
        $this->createdAt = new \DateTimeImmutable();
    }

    public function gelatoId()
    {
        if (null === $this->gelatoId) {
            $this->crafstmanId = new GelatoId($this->id());
        }

        return $this->gelatoId;
    }
}