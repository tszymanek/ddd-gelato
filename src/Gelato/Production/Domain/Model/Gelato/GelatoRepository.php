<?php

namespace Gelato\Production\Domain\Model\Gelato;

use Gelato\Production\Domain\Model\Craftsman\CraftsmanId;

interface GelatoRepository
{
    /**
     * @return GelatoId
     */
    public function nextIdentity();

    /**
     * @return Gelato[]
     */
    public function all();

    /**
     * @param GelatoId $gelatoId
     * @return Gelato
     */
    public function ofId(GelatoId $gelatoId);

    /**
     * @param CraftsmanId $crafstmanId
     * @return Gelato
     */
    public function ofCraftsmanId(CraftsmanId $crafstmanId);

    /**
     * @param Flavor $flavor
     * @return Gelato
     */
    public function ofFlavor(Flavor $flavor);

    /**
     * @param Gelato $gelato
     */
    public function add(Gelato $gelato);

    /**
     * @param Gelato $gelato
     */
    public function remove(Gelato $gelato);
}
