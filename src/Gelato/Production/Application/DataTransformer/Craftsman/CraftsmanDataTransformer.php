<?php

namespace Gelato\Production\Application\DataTransformer\Craftsman;

use Gelato\Production\Domain\Model\Craftsman\Craftsman;

interface CraftsmanDataTransformer
{
    public function write(Craftsman $craftsman);

    /**
     * @return mixed
     */
    public function read();
}