<?php

namespace Gelato\Sale\Domain\Model\Freezer;

use Doctrine\Common\Collections\ArrayCollection;

class Showcase extends Freezer
{
    private $gelatos;

    public function __construct(FreezerId $anId, $aCapacity, $aParlor)
    {
        parent::__construct($anId, $aCapacity, $aParlor);
        $this->gelatos = new ArrayCollection();
    }
}