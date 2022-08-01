<?php

namespace Vini\PooPhp\Person\Domain\Model;

use Vini\PooPhp\Address\Domain\Model\Address;

class AbstractPerson
{
    protected string $name;
    protected Address $address;
}