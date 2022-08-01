<?php

namespace Vini\PooPhp\Address\Domain\Model;

class Address
{
    protected City $city;
    protected string $street;
    protected string $zipCode;
    protected int $number;
    protected string|null $complement;

    /**
     * @param City $city
     * @param string $street
     * @param string $zipCode
     * @param int $number
     * @param string|null $complement
     */
    public function __construct(City $city, string $street, string $zipCode, int $number, ?string $complement)
    {
        $this->city = $city;
        $this->street = $street;
        $this->zipCode = $zipCode;
        $this->number = $number;
        $this->complement = $complement;
    }
}