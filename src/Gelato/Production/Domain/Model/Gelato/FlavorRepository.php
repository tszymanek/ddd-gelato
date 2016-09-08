<?php

namespace Gelato\Production\Domain\Model\Gelato;

interface FlavorRepository
{
    public function ofName($aName);
    public function add(Flavor $aFlavor);
    public function remove(Flavor $aFlavor);
}
