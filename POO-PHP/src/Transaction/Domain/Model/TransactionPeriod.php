<?php

namespace Vini\PooPhp\Transaction\Domain\Model;

class TransactionPeriod
{
    protected \DateTime $startDate;
    protected \DateTime $endDate;
    protected TransactionCollection $transactionCollectionAsReciver;
    protected TransactionCollection $transactionCollectionAsSender;

    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    public function getAmountBalanceFromPeriod()
    {
        return $this->transactionCollectionAsReciver->getSumFromCollection() - $this->transactionCollectionAsSender->getSumFromCollection();
    }

    public function getAsReciverTransactionCollection()
    {
        return $this->transactionCollectionAsReciver;
    }

    public function getAsSenderTransactionCollection()
    {
        return $this->transactionCollectionAsSender;
    }

    public function getAllTransactions()
    {
        return array_merge($this->transactionCollectionAsReciver->getList(), $this->transactionCollectionAsSender->getList());
    }
}