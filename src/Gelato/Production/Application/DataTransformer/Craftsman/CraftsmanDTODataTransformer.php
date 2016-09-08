<?php

namespace Gelato\Production\Application\DataTransformer\Craftsman;

use Gelato\Production\Domain\Model\Craftsman\Craftsman;

class CraftsmanDTODataTransformer implements CraftsmanDataTransformer
{
    /** @var Craftsman */
    private $craftsman;

    public function write(Craftsman $craftsman)
    {
        $this->craftsman = $craftsman;

        return $this;
    }

    /**
     * @return array
     */
    public function read()
    {
        return [
            'id' => $this->craftsman->craftsmanId(),
            'firstName' => $this->craftsman->firstName(),
            'lastName' => $this->craftsman->lastName()
        ];
    }
}