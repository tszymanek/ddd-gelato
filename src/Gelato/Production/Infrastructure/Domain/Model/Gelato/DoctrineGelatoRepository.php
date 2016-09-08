<?php

namespace Production\Infrastructure\Domain\Model\Gelato;

use Production\Domain\Model\Gelato\Gelato;
use Production\Domain\Model\Gelato\GelatoId;
use Production\Domain\Model\Gelato\GelatoRepository;

use Doctrine\ORM\EntityRepository;

class DoctrineGelatoRepository extends EntityRepository implements GelatoRepository
{
    public function nextIdentity()
    {
        return GelatoId::create();
    }

    public function produce(Gelato $aGelato)
    {
        $this->getEntityManager()->persist($aGelato);
    }
}
