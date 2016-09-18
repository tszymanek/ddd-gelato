<?php

namespace Gelato\Production\Application\DataTransformer\Gelato;

use Gelato\Production\Domain\Model\Gelato\Flavor;

interface FlavorDataTransformer
{
    public function write(Flavor $flavor);

    /**
     * @return mixed
     */
    public function read();
}
