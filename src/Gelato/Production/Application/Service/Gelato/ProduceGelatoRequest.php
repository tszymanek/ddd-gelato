<?php

namespace Gelato\Production\Application\Service\Gelato;

class ProduceGelatoRequest
{
    private $flavor;
    private $craftsmanId;

    /**
     * @param string $flavor
     * @param string $craftsmanId
     */
    public function __construct($flavor, $craftsmanId)
    {
        $this->flavor = $flavor;
        $this->craftsmanId = $craftsmanId;
    }

    /**
     * @return string
     */
    public function flavor()
    {
        return $this->flavor;
    }

    /**
     * @return string
     */
    public function craftsmanId()
    {
        return $this->craftsmanId;
    }
}
