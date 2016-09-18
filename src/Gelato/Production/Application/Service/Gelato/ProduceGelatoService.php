<?php

namespace Gelato\Production\Application\Service\Gelato;

class ProduceGelatoService extends GelatoService
{
    public function execute(ProduceGelatoRequest $request)
    {
        $craftsmanId = $request->craftsmanId();
        $flavor = $request->flavor();

        $craftsman = $this->findCraftsmanOrFail($craftsmanId);

        $gelato = $craftsman->produceGelato(
            $this->gelatoRepository->nextIdentity(),
            $flavor
        );

        $this->gelatoRepository->add($gelato);
        $this->gelatoDataTransformer->write($gelato);
        return $this->gelatoDataTransformer->read();
    }
}
