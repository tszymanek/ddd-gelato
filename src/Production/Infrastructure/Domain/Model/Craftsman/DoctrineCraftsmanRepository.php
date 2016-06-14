<?php

namespace Production\Infrastructure\Domain\Model\Craftsman;

use Production\Domain\Model\Craftsman\CraftsmanRepository;
use Production\Domain\Model\Gelato\Gelato;

use Doctrine\ORM\EntityRepository;

class DoctrineCraftsmanRepository extends EntityRepository implements CraftsmanRepository
{
    private $gelato;
    private $freezer;
//    public function prepare(Gelato $aGelato)
//    {
//    }


    public function produce(Gelato $aGelato)
    {
        $this->gelato = $aGelato;
    }

    public function place(Gelato $aGelato, Freezer $labFreezer)
    {
        $this->freezer =
    }
}