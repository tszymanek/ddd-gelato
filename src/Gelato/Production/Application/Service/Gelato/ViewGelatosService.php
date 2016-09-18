<?php

namespace Gelato\Production\Application\Service\Gelato;

use Gelato\Production\Domain\Model\Gelato\Gelato;
use Gelato\Production\Domain\Model\Gelato\GelatoRepository;

class ViewGelatosService
{
    /**
     * @var GelatoRepository
     */
    private $gelatoRepository;

    public function __construct(
        GelatoRepository $gelatoRepository
    ) {
        $this->gelatoRepository = $gelatoRepository;
    }

    /**
     * @return Gelato[]
     */
    public function execute($request = null)
    {
        return $this->gelatoRepository->all();
    }
}