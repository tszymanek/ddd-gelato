<?php

namespace Gelato\Sale\Application\Service\Freezer;

class CreateFreezerRequest
{
    private $capacity;
    private $type;
    private $parlor;

    public function __construct($capacity, $type, $parlor)
    {
        $this->capacity = $capacity;
        $this->type = $type;
        $this->parlor = $parlor;
    }

    public function capacity()
    {
        return $this->capacity;
    }

    public function type()
    {
        return $this->type;
    }

    public function parlor()
    {
        return $this->parlor;
    }
}
