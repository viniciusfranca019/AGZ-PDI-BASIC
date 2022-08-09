<?php

namespace Vini\PooPhp\Transaction\Domain\Model;

use Vini\PooPhp\Account\Domain\Model\CheckingAccount;
use Vini\PooPhp\Account\Domain\Model\InvestmentAccount;

class RedemptionTransaction extends AbstractTransaction
{

    public function __construct(InvestmentAccount $sender, CheckingAccount $reciver, float $amount, \DateTime $transactionDate)
    {
        parent::__construct($sender, $reciver, $amount, $transactionDate);
        $this->execute();
    }

    protected function execute()
    {
        $this->sender->doTransaction($this, TransactionOperators::SENDER_OPERADOR);
        $this->reciver->doTransaction($this, TransactionOperators::RECIVER_OPERATOR);
    }
}