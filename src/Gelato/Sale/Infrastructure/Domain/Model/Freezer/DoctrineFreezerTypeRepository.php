<?php

namespace Gelato\Sale\Infrastructure\Domain\Model\Freezer;

use Gelato\Sale\Domain\Model\Freezer\FreezerType;
use Gelato\Sale\Domain\Model\Freezer\FreezerTypeRepository;

use Doctrine\ORM\EntityRepository;

class DoctrineFreezerTypeRepository extends EntityRepository implements FreezerTypeRepository
{
    public function all()
    {
        return $this->findAll();
    }

    public function ofName($aName)
    {
        return $this->find($aName);
    }

    public function add(FreezerType $aFreezerType)
    {
        $this->getEntityManager()->persist($aFreezerType);
        $this->getEntityManager()->flush($aFreezerType);
    }
}
