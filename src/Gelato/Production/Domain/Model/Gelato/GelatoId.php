<?php

namespace Gelato\Production\Domain\Model\Gelato;

use Ramsey\Uuid\Uuid;

class GelatoId
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $anId
     */
    public function __construct($anId = null)
    {
        $this->id = $anId ?: Uuid::uuid4()->toString();
    }

    /**
     * @param string $anId
     * @return GelatoId
     */
    public static function create($anId = null)
    {
        return new static($anId);
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param GelatoId $aGelatoId
     * @return bool
     */
    public function equalsTo(GelatoId $aGelatoId)
    {
        return $aGelatoId === $this->id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id;
    }
}
