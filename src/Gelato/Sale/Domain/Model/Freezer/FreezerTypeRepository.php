<?php

namespace Gelato\Sale\Domain\Model\Freezer;

interface FreezerTypeRepository
{
    public function all();
    public function ofName($aName);
    public function add(FreezerType $aFreezerType);
}
