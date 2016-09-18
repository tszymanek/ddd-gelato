<?php

namespace Gelato\Production\Application\DataTransformer\Gelato;

use Gelato\Production\Domain\Model\Gelato\Gelato;

class GelatoDTODataTransformer implements GelatoDataTransformer
{
    /** @var Gelato */
    private $gelato;

    public function write(Gelato $gelato)
    {
        $this->gelato = $gelato;

        return $this;
    }

    /**
     * @return array
     */
    public function read()
    {
        return [
            'id' => $this->gelato->gelatoId(),
            'flavor' => $this->gelato->flavor()
        ];
    }
}
