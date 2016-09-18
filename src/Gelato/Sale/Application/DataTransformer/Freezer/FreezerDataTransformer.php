<?php

namespace Gelato\Sale\Application\DataTransformer\Freezer;

use Gelato\Sale\Domain\Model\Freezer\Freezer;

interface FreezerDataTransformer
{
    public function write(Freezer $craftsman);

    /**
     * @return mixed
     */
    public function read();
}