<?php

namespace Vini\PooPhp\Account\Domain\Model;

use Vini\PooPhp\Person\Domain\Model\AbstractPerson;
use Vini\PooPhp\Transaction\Domain\Model\TransactionCollection;

abstract class AbstractAccount
{
    protected AbstractPerson $owner;
    protected TransactionCollection $transactionCollection;

    /**
     * @param AbstractPerson $owner
     */
    public function __construct(AbstractPerson $owner)
    {
        $this->owner = $owner;
    }

    public function getTransactions()
    {
        return $this->transactionCollection;
    }
}