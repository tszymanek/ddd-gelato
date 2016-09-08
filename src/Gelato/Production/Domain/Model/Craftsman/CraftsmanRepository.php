<?php

namespace Gelato\Production\Domain\Model\Craftsman;

interface CraftsmanRepository
{
    public function ofId(CraftsmanId $craftsmanId);
    public function ofName($firstName, $lastName);
    public function nextIdentity();
    public function add(Craftsman $aCraftsman);
    public function remove(Craftsman $aCraftstman);
}
