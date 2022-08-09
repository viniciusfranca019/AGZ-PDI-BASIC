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
     * @todo validar que nenhuma conta pode ter um actualAmount menor que zero
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

    protected function execute()
    {
        $this->sender->doTransaction($this, TransactionOperators::SENDER_OPERADOR);
        $this->reciver->doTransaction($this, TransactionOperators::RECIVER_OPERATOR);
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return \DateTime
     */
    public function getTransactionDate(): \DateTime
    {
        return $this->transactionDate;
    }

}