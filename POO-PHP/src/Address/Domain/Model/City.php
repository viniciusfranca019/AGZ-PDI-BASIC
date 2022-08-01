<?php

namespace Vini\PooPhp\Address\Domain\Model;

class City
{
    protected State $state;
    protected string $name;

    /**
     * @param State $state
     * @param string $name
     */
    public function __construct(string $name, State $state)
    {
        $this->state = $state;
        $this->name = $name;
    }
}