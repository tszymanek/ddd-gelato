<?php

namespace Gelato\Production\Application\Service\Gelato;

class FlavorRequest
{
    private $flavor;

    /**
     * @param string $flavor
     */
    public function __construct($flavor)
    {
        $this->flavor = $flavor;
    }

    /**
     * @return string
     */
    public function flavor()
    {
        return $this->flavor;
    }
}
