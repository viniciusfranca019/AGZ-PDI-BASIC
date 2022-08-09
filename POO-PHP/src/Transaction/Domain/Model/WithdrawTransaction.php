<?php

namespace Vini\PooPhp\Transaction\Domain\Model;

use Vini\PooPhp\Account\Domain\Model\AbstractAccount;
use Vini\PooPhp\Account\Domain\Model\CheckingAccount;
use Vini\PooPhp\Account\Domain\Model\ExternalAccount;
use Vini\PooPhp\Account\Domain\Model\SavingAccount;

class WithdrawTransaction extends AbstractTransaction
{

    public function __construct(CheckingAccount|SavingAccount $sender, ExternalAccount $reciver, float $amount, \DateTime $transactionDate)
    {
        parent::__construct($sender, $reciver, $amount, $transactionDate);
        $this->execute();
    }
}