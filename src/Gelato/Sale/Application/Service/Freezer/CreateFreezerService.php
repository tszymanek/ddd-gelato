<?php

namespace Gelato\Sale\Application\Service\Freezer;

use Gelato\Sale\Application\DataTransformer\Freezer\FreezerDataTransformer;
use Gelato\Sale\Domain\Model\Freezer\Freezer;
use Gelato\Sale\Domain\Model\Freezer\FreezerRepository;

class CreateFreezerService
{
    private $freezerRepository;
    private $freezerDataTransformer;

    public function __construct(
        FreezerRepository $freezerRepository,
        FreezerDataTransformer $freezerDataTransformer
    )
    {
        $this->freezerRepository = $freezerRepository;
        $this->freezerDataTransformer = $freezerDataTransformer;
    }

    public function execute(CreateFreezerRequest $request)
    {
        $capacity = $request->capacity();
        $type = $request->type();
        $parlor = $request->parlor();

/*        if ($freezer) {
            throw new FreezerAlreadyExistsException();
        }*/

        $freezer = new Freezer(
            $this->freezerRepository->nextIdentity(),
            $parlor,
            $type,
            $capacity
        );

        $this->freezerRepository->add($freezer);
        $this->freezerDataTransformer->write($freezer);

        return $this->freezerDataTransformer->read();
    }
}
