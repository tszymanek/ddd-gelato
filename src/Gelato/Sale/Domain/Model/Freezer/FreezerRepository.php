<?php

namespace Gelato\Sale\Domain\Model\Freezer;

interface FreezerRepository
{
    public function ofId(FreezerId $freezerId);
    public function ofParlor($parlor);
    public function nextIdentity();
    public function add(Freezer $aFreezer);
    public function remove(Freezer $aFreezer);
}
