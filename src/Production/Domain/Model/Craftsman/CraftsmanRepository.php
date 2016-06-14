<?php

namespace Production\Domain\Model\Craftsman;

use Production\Domain\Model\Gelato\Gelato;

interface CraftsmanRepository
{
//    public function prepare(Gelato $aGelato);
    public function produce(Gelato $aGelato);
    public function place(Gelato $aGelato, Freezer $labFreezer);
}