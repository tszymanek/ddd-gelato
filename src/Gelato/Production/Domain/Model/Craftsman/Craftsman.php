<?php

namespace Gelato\Production\Domain\Model\Craftsman;

use Gelato\Common\Domain\IdentifiableDomainObject;
use Gelato\Production\Domain\Model\Gelato\Flavor;
use Gelato\Production\Domain\Model\Gelato\Gelato;
use Gelato\Production\Domain\Model\Gelato\GelatoId;

class Craftsman extends IdentifiableDomainObject
{
    /**
     * @var CraftsmanId
     */
    private $craftsmanId;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @param CraftsmanId $anId
     * @param string $aFirstName
     * @param string $aLastName
     */
    public function __construct(
        CraftsmanId $anId,
        $aFirstName,
        $aLastName
    ) {
        $this->craftsmanId = $anId;
        $this->firstName = $aFirstName;
        $this->lastName = $aLastName;
    }

    /**
     * @return CraftsmanId
     */
    public function craftsmanId()
    {
        if (null === $this->craftsmanId) {
            $this->craftsmanId = new CraftsmanId($this->id());
        }

        return $this->craftsmanId;
    }

    /**
     * @return string
     */
    public function firstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function lastName()
    {
        return $this->lastName;
    }

    /**
     * @param GelatoId $gelatoId
     * @param string $flavorName
     * @return Gelato
     */
    public function produceGelato(GelatoId $gelatoId, $flavorName)
    {
        $gelato = new Gelato(
            $gelatoId,
            new Flavor($flavorName),
            $this->craftsmanId()
        );

        return $gelato;
    }
}
