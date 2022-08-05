<?php

namespace Vini\PooPhp\Account\Domain\Model;

use Vini\PooPhp\Person\Domain\Model\AbstractPerson;

abstract class AbstractAccount
{
    protected AbstractPerson $owner;

    /**
     * @param AbstractPerson $owner
     */
    public function __construct(AbstractPerson $owner)
    {
        $this->owner = $owner;
    }
}