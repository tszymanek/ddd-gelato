<?php

namespace Gelato\Production\Application\Service\Gelato;

use Gelato\Common\Domain\DomainEvent;
use Gelato\Common\Domain\Event\PublishableDomainEvent;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanId;
use Gelato\Production\Domain\Model\Gelato\GelatoId;

class GelatoProduced implements DomainEvent, PublishableDomainEvent
{
    private $gelatoId;
    private $flavor;
    private $craftsmanId;

    /**
     * @var \DateTimeImmutable
     */
    private $occurredOn;

    public function __construct(
        GelatoId $gelatoId,
        $flavor,
        CraftsmanId $craftsmanId
    ) {
        $this->gelatoId = $gelatoId;
        $this->flavor = $flavor;
        $this->craftsmanId = $craftsmanId;
        $this->occurredOn = new \DateTimeImmutable();
    }

    /**
     * @return GelatoId
     */
    public function gelatoId()
    {
        return $this->gelatoId;
    }

    /**
     * @return string
     */
    public function flavor()
    {
        return $this->flavor;
    }

    /**
     * @return CraftsmanId
     */
    public function craftsmanId()
    {
        return $this->craftsmanId;
    }

    /**
     * @return \DateTime
     */
    public function occurredOn()
    {
        return $this->occurredOn;
    }
}
