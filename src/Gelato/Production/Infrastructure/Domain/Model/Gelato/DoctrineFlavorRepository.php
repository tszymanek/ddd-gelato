<?php

namespace Gelato\Production\Infrastructure\Domain\Model\Craftsman;

use Gelato\Production\Domain\Model\Gelato\Flavor;
use Gelato\Production\Domain\Model\Gelato\FlavorRepository;

use Doctrine\ORM\EntityRepository;

class DoctrineFlavorRepository extends EntityRepository implements FlavorRepository
{
    public function ofName($aName)
    {
        return $this->find($aName);
    }

    public function add(Flavor $aFlavor)
    {
        $this->getEntityManager()->persist($aFlavor);
        $this->getEntityManager()->flush($aFlavor);
    }

    public function remove(Flavor $aFlavor)
    {
        $this->getEntityManager()->remove($aFlavor);
    }
}
