<?php

namespace Production\Domain\Model\Freezer;

use Doctrine\Common\Collections\ArrayCollection;

class Freezer
{
    private $freezerId;

    private $capacity;

    /**
     * @var ArrayCollection
     */
    private $gelatos;

    public function __construct(
      $anId,
      $aCapacity
    ) {
        $this->freezerId = $anId;
        $this->gelatos = new ArrayCollection();
        $this->capacity = $aCapacity;
    }
}