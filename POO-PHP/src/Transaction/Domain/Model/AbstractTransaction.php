<?php

namespace Vini\PooPhp\Transaction\Domain\Model;

use Vini\PooPhp\Account\Domain\Model\AbstractAccount;

abstract class AbstractTransaction
{
    protected AbstractAccount $sender;
    protected AbstractAccount $reciver;
    protected float $amount;
    protected \DateTime $transactionDate;

    /**
     * @param AbstractAccount $sender
     * @param AbstractAccount $reciver
     * @param float $amount
     * @param \DateTime $transactionDate
     */
    public function __construct(AbstractAccount $sender, AbstractAccount $reciver, float $amount, \DateTime $transactionDate)
    {
        $this->sender = $sender;
        $this->reciver = $reciver;
        $this->amount = $amount;
        $this->transactionDate = $transactionDate;
    }

}