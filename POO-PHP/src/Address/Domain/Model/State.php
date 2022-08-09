<?php

namespace Vini\PooPhp\Address\Domain\Model;

class State
{
    protected Country $country;
    protected string $name;
    protected string $abbreviation;

    /**
     * @param Country $country
     * @param string $name
     * @param string $abbreviation
     */
    public function __construct(string $name, string $abbreviation, Country $country)
    {
        $this->country = $country;
        $this->name = $name;
        $this->abbreviation = $abbreviation;
    }
}