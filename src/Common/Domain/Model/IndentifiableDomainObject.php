<?php

namespace Common\Domain\Model;

abstract class IdentifiableDomainObject
{
    private $id;

    protected function id()
    {
        return $this->id;
    }

    protected function setId($anId)
    {
        $this->id = $anId;
    }
}
