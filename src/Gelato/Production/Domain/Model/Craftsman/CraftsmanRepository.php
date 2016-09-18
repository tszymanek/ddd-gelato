<?php

namespace Gelato\Production\Domain\Model\Craftsman;

interface CraftsmanRepository
{
    /**
     * @param CraftsmanId $craftsmanId
     * @return Craftsman
     */
    public function ofId(CraftsmanId $craftsmanId);

    /**
     * @param string $firstName
     * @param string $lastName
     * @return Craftsman
     */
    public function ofName($firstName, $lastName);

    /**
     * @param Craftsman $aCraftsman
     */
    public function add(Craftsman $aCraftsman);

    /**
     * @return CraftsmanId
     */
    public function nextIdentity();
}
