<?php

namespace Gelato\Production\Application\DataTransformer\Gelato;

use Gelato\Production\Domain\Model\Gelato\Gelato;

interface GelatoDataTransformer
{
    public function write(Gelato $gelato);

    /**
     * @return mixed
     */
    public function read();
}
