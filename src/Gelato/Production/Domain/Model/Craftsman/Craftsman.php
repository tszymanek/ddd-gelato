<?php

namespace Gelato\Production\Domain\Model\Craftsman;

use Gelato\Common\Domain\IdentifiableDomainObject;
use Gelato\Production\Domain\Model\Gelato\Flavor;

class Craftsman extends IdentifiableDomainObject
{
    private $craftsmanId;
    private $firstName;
    private $lastName;

    public function __construct(
        CraftsmanId $anId,
        $aFirstName,
        $aLastName
    ) {
        $this->craftsmanId = $anId;
        $this->firstName = $aFirstName;
        $this->lastName = $aLastName;
    }

    public function craftsmanId()
    {
        if (null === $this->craftsmanId) {
            $this->crafstmanId = new CraftsmanId($this->id());
        }

        return $this->craftsmanId;
    }

    public function firstName()
    {
        return $this->firstName;
    }

    public function lastName()
    {
        return $this->lastName;
    }

    public function provideFlavor($aName)
    {
        return new Flavor($aName);
    }

    public function produceGelato(CraftsmanId $aCraftsmanId, Flavor $aName)
    {
        return new Gelato();
    }
}
