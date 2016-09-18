<?php

namespace Gelato\Production\Infrastructure\Domain\Model\Gelato;

use Gelato\Production\Domain\Model\Craftsman\CraftsmanId;
use Gelato\Production\Domain\Model\Gelato\Flavor;
use Gelato\Production\Domain\Model\Gelato\Gelato;
use Gelato\Production\Domain\Model\Gelato\GelatoId;
use Gelato\Production\Domain\Model\Gelato\GelatoRepository;

use Doctrine\ORM\EntityRepository;

class DoctrineGelatoRepository extends EntityRepository implements GelatoRepository
{
    /**
     * @return GelatoId
     */
    public function nextIdentity()
    {
        return GelatoId::create();
    }

    /**
     * @return Gelato[]
     */
    public function all()
    {
        return $this->findAll();
    }

    /**
     * @param GelatoId $gelatoId
     * @return null|Gelato
     */
    public function ofId(GelatoId $gelatoId)
    {
        return $this->find($gelatoId);
    }

    public function ofCraftsmanId(CraftsmanId $crafstmanId)
    {
        // TODO: Implement ofCraftsmanId() method.
    }

    public function ofFlavor(Flavor $flavor)
    {
        // TODO: Implement ofFlavor() method.
    }

    /**
     * @param Gelato $gelato
     */
    public function add(Gelato $gelato)
    {
        $this->getEntityManager()->persist($gelato);
        $this->getEntityManager()->flush($gelato);
    }

    /**
     * @param Gelato $gelato
     */
    public function remove(Gelato $gelato)
    {
        $this->getEntityManager()->remove($gelato);
        $this->getEntityManager()->flush($gelato);
    }
}
