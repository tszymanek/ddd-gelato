<?php

namespace Gelato\Production\Application\Service\Craftsman;

use Gelato\Production\Application\DataTransformer\Craftsman\CraftsmanDataTransformer;
use Gelato\Production\Domain\Model\Craftsman\Craftsman;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanAlreadyExistsException;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanRepository;

class CreateCraftsmanService
{
    private $craftsmanRepository;
    private $craftsmanDataTransformer;

    public function __construct(
        CraftsmanRepository $craftsmanRepository,
        CraftsmanDataTransformer $craftsmanDataTransformer
    )
    {
        $this->craftsmanRepository = $craftsmanRepository;
        $this->craftsmanDataTransformer = $craftsmanDataTransformer;
    }

    public function execute(CreateCraftsmanRequest $request)
    {
        $firstName = $request->firstName();
        $lastName = $request->lastName();

        $craftsman = $this->craftsmanRepository->ofName($firstName, $lastName);

        if ($craftsman) {
            throw new CraftsmanAlreadyExistsException();
        }

        $craftsman = new Craftsman(
            $this->craftsmanRepository->nextIdentity(),
            $firstName,
            $lastName
        );

        $this->craftsmanRepository->add($craftsman);
        $this->craftsmanDataTransformer->write($craftsman);

        return $this->craftsmanDataTransformer->read();
    }
}
