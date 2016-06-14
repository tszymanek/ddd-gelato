<?php

namespace Production\Domain\Model\Craftsman;

use Ramsey\Uuid\Uuid;

class CraftsmanId
{
    private $id;

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

    public function equalsTo(CraftsmanId $aCraftsmanId)
    {
        return $aCraftsmanId === $this->id;
    }

    public function __toString()
    {
        return $this->id;
    }
}
