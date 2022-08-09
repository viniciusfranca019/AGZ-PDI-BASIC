<?php

namespace Vini\PooPhp\Transaction\Domain\Model;

use Vini\PooPhp\Account\Domain\Model\CheckingAccount;
use Vini\PooPhp\Account\Domain\Model\SavingAccount;

class TransferTransaction extends AbstractTransaction
{
    public function __construct(CheckingAccount|SavingAccount $sender, CheckingAccount|SavingAccount $reciver, float $amount, \DateTime $transactionDate)
    {
        parent::__construct($sender, $reciver, $amount, $transactionDate);
        $this->execute();
    }
}