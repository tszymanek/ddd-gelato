<?php

namespace Gelato\Production\Application\DataTransformer\Gelato;

use Gelato\Production\Domain\Model\Gelato\Flavor;

class FlavorDTODataTransformer implements FlavorDataTransformer
{
    /** @var Flavor */
    private $flavor;

    public function write(Flavor $flavor)
    {
        $this->flavor = $flavor;

        return $this;
    }

    /**
     * @return array
     */
    public function read()
    {
        return [
            'name' => $this->flavor->name()
        ];
    }
}
