<?php

namespace Gelato\Sale\Domain\Model\Freezer;

use Gelato\Production\Domain\Model\Gelato\GelatoId;

class FreezerGelato
{
    private $gelatoId;
    private $name;
    private $position;
    private $createdAt;

    public function __construct(
        GelatoId $anId,
        $aName,
        $aPosition = null,
        $createdAt
    ) {
        $this->gelatoId = $anId;
        $this->name = $aName;
        $this->position = $aPosition;
        $this->createdAt = $createdAt;
    }

    public function position()
    {
        return $this->position;
    }
}