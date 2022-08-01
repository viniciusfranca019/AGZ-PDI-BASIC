<?php

namespace Vini\PooPhp\Address\Domain\Model;

class Country
{
    protected string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }


}