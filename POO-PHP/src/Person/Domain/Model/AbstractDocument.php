<?php

namespace Vini\PooPhp\Person\Domain\Model;

abstract class AbstractDocument
{
    protected string $number;

    /**
     * @param string $number
     */
    public function __construct(string $number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }
}