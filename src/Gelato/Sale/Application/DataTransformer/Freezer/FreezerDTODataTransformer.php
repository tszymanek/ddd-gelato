<?php

namespace Gelato\Sale\Application\DataTransformer\Freezer;

use Gelato\Sale\Domain\Model\Freezer\Freezer;

class FreezerDTODataTransformer implements FreezerDataTransformer
{
    /** @var Freezer */
    private $freezer;

    public function write(Freezer $freezer)
    {
        $this->freezer = $freezer;

        return $this;
    }

    /**
     * @return array
     */
    public function read()
    {
        return [
            'id' => $this->freezer->freezerId(),
            'capacity' => $this->freezer->capacity(),
            'parlor' => $this->freezer->parlor()
        ];
    }
}