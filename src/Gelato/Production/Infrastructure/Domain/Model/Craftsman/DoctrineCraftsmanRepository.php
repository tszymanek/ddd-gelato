<?php

namespace Gelato\Production\Infrastructure\Domain\Model\Craftsman;

use Gelato\Production\Domain\Model\Craftsman\Craftsman;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanId;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanRepository;

use Doctrine\ORM\EntityRepository;

class DoctrineCraftsmanRepository extends EntityRepository implements CraftsmanRepository
{
    public function ofId(CraftsmanId $craftsmanId)
    {
        return $this->find($craftsmanId);
    }

    public function ofName($firstName, $lastName)
    {
        return $this->findOneBy(
            ['firstName' => $firstName, 'lastName' => $lastName]
        );
    }

    public function nextIdentity()
    {
        return CraftsmanId::create();
    }

    public function add(Craftsman $aCraftsman)
    {
        $this->getEntityManager()->persist($aCraftsman);
        $this->getEntityManager()->flush($aCraftsman);
    }

    public function remove(Craftsman $aCraftsman)
    {
        $this->getEntityManager()->remove($aCraftsman);
    }
}
