<?php

namespace Gelato\Sale\Infrastructure\Domain\Model\Freezer;

use Gelato\Sale\Domain\Model\Freezer\Freezer;
use Gelato\Sale\Domain\Model\Freezer\FreezerId;
use Gelato\Sale\Domain\Model\Freezer\FreezerRepository;

use Doctrine\ORM\EntityRepository;

class DoctrineFreezerRepository extends EntityRepository implements FreezerRepository
{
    public function ofId(FreezerId $freezerId)
    {
        return $this->find($freezerId);
    }

    public function ofParlor($parlor)
    {
        return $this->find($parlor);
    }

    public function nextIdentity()
    {
        return FreezerId::create();
    }

    public function add(Freezer $aFreezer)
    {
        $this->getEntityManager()->persist($aFreezer);
        $this->getEntityManager()->flush($aFreezer);
    }

    public function remove(Freezer $aFreezer)
    {
        $this->getEntityManager()->remove($aFreezer);
        $this->getEntityManager()->flush($aFreezer);
    }
}
