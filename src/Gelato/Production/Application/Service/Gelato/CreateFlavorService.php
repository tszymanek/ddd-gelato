<?php

namespace Gelato\Production\Application\Service\Gelato;

use Gelato\Production\Application\DataTransformer\Gelato\FlavorDataTransformer;
use Gelato\Production\Domain\Model\Gelato\Flavor;
use Gelato\Production\Domain\Model\Gelato\FlavorAlreadyExistsException;
use Gelato\Production\Domain\Model\Gelato\FlavorRepository;

class CreateFlavorService
{
    private $flavorRepository;
    private $flavorDataTransformer;

    public function __construct(
        FlavorRepository $flavorRepository,
        FlavorDataTransformer $flavorDataTransformer
    ) {
        $this->flavorRepository = $flavorRepository;
        $this->flavorDataTransformer = $flavorDataTransformer;
    }

    public function execute(FlavorRequest $request)
    {
        $name = $request->flavor();

        $flavor = $this->flavorRepository->ofName($name);

        if ($flavor) {
            throw new FlavorAlreadyExistsException();
        }

        $flavor = new Flavor($name);

        $this->flavorRepository->add($flavor);
        $this->flavorDataTransformer->write($flavor);

        return $this->flavorDataTransformer->read();
    }
}