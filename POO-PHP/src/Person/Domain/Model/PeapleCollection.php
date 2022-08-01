<?php

namespace Vini\PooPhp\Person\Domain\Model;

use Vini\PooPhp\Util\AbstractCollection;

class PeapleCollection extends AbstractCollection
{

    public function __construct(Individual ...$peapleList)
    {
        $this->list = $peapleList;
    }

    public function addPerson(Individual $person)
    {
        $this->list[] = $person;
    }
}