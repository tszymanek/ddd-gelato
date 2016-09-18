<?php

namespace Gelato\Production\Application\Service\Gelato;

use Gelato\Production\Application\DataTransformer\Gelato\GelatoDataTransformer;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanDoesNotExistException;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanId;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanRepository;
use Gelato\Production\Domain\Model\Gelato\GelatoDoesNotExistException;
use Gelato\Production\Domain\Model\Gelato\GelatoId;
use Gelato\Production\Domain\Model\Gelato\GelatoRepository;

abstract class GelatoService
{
    protected $craftsmanRepository;
    protected $gelatoRepository;
    protected $gelatoDataTransformer;

    public function __construct(
        CraftsmanRepository $craftsmanRepository,
        GelatoRepository $gelatoRepository,
        GelatoDataTransformer $gelatoDataTransformer
    ) {
        $this->craftsmanRepository = $craftsmanRepository;
        $this->gelatoRepository = $gelatoRepository;
        $this->gelatoDataTransformer = $gelatoDataTransformer;
    }

    protected function findCraftsmanOrFail($craftsmanId)
    {
        $craftsman = $this->craftsmanRepository->ofId(new CraftsmanId($craftsmanId));

        if (!$craftsman) {
            throw new CraftsmanDoesNotExistException();
        }

        return $craftsman;
    }

    protected function findGelatoOrFail($gelatoId)
    {
        $gelato = $this->gelatoRepository->ofId(new GelatoId($gelatoId));
        if (!$gelato) {
            throw new GelatoDoesNotExistException();
        }

        return $gelato;
    }
}
