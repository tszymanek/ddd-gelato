<?php

namespace Gelato\Production\Domain\Model\Gelato;

use Gelato\Common\Domain\IdentifiableDomainObject;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanId;

class Gelato extends IdentifiableDomainObject
{
    /**
     * @var GelatoId
     */
    private $gelatoId;

    /**
     * @var CraftsmanId
     */
    private $craftsmanId;

    /**
     * @var Flavor
     */
    private $flavor;

    /**
     * @var \DateTimeImmutable
     */
    private $createdAt;

    /**
     * @param GelatoId $anId
     * @param Flavor $aFlavor
     * @param CraftsmanId $aCraftsmanId
     */
    public function __construct(
        GelatoId $anId,
        Flavor $aFlavor,
        CraftsmanId $aCraftsmanId
    ) {
        $this->gelatoId = $anId;
        $this->flavor = $aFlavor;
        $this->craftsmanId = $aCraftsmanId;
        $this->createdAt = new \DateTimeImmutable();
    }

    /**
     * @return GelatoId
     */
    public function gelatoId()
    {
        if (null === $this->gelatoId) {
            $this->gelatoId = new GelatoId($this->id());
        }

        return $this->gelatoId;
    }

    /**
     * @return string
     */
    public function flavor()
    {
        return $this->flavor->name();
    }

    /**
     * @return \DateTimeImmutable
     */
    public function createdAt()
    {
        return $this->createdAt;
    }
}
