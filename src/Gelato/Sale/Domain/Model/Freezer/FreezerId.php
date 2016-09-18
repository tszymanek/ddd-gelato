<?php

namespace Gelato\Sale\Domain\Model\Freezer;

use Ramsey\Uuid\Uuid;

class FreezerId
{
    public function __construct($anId = null)
    {
        $this->id = $anId ?: Uuid::uuid4()->toString();
    }

    public static function create($anId = null)
    {
        return new static($anId);
    }

    public function id()
    {
        return $this->id;
    }

    public function equalsTo(FreezerId $aFreezerId)
    {
        return $aFreezerId === $this->id;
    }

    public function __toString()
    {
        return $this->id;
    }
}
