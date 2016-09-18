<?php

namespace Gelato\Production\Domain\Model\Craftsman;

use Ramsey\Uuid\Uuid;

class CraftsmanId
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
     * @param null $anId
     * @return CraftsmanId
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
     * @param CraftsmanId $aCraftsmanId
     * @return bool
     */
    public function equalsTo(CraftsmanId $aCraftsmanId)
    {
        return $aCraftsmanId === $this->id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id;
    }
}
