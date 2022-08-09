<?php

namespace Vini\PooPhp\Transaction\Domain\Model;

use Vini\PooPhp\Account\Domain\Model\AbstractAccount;
use Vini\PooPhp\Account\Domain\Model\ExternalAccount;

class DepositTransaction extends AbstractTransaction
{
    public function __construct(ExternalAccount $sender, AbstractAccount $reciver, float $amount, \DateTime $transactionDate)
    {
        parent::__construct($sender, $reciver, $amount, $transactionDate);
        $this->execute();
    }
}