<?php

namespace Vini\PooPhp\Account\Domain\Model;

use Vini\PooPhp\Person\Domain\Model\AbstractPerson;
use Vini\PooPhp\Transaction\Domain\Model\AbstractTransaction;
use Vini\PooPhp\Transaction\Domain\Model\TransactionCollection;

abstract class AbstractAccount
{
    protected AbstractPerson $owner;
    protected \DateTime $openingDate;
    protected TransactionCollection $transactionCollection;
    protected float $amount = 0.0;

    /**
     * @param AbstractPerson $owner
     */
    public function __construct(AbstractPerson $owner, \DateTime $openingDate)
    {
        $this->owner = $owner;
        $this->openingDate = $openingDate;
    }

    public function getTransactions()
    {
        return $this->transactionCollection;
    }

    public function doTransaction(AbstractTransaction $transaction, int $transactionOperator) : void
    {
        $this->amount += $transaction->getAmount() * $transactionOperator;
    }
}