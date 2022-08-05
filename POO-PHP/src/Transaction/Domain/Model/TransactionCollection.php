<?php

namespace Vini\PooPhp\Transaction\Domain\Model;

use Carbon\Carbon;

class TransactionCollection extends \Vini\PooPhp\Util\AbstractCollection
{
    public function __construct(AbstractTransaction ...$transactionList)
    {
        parent::__construct($transactionList);
    }

    public function add($transaction) : void {
        if(!$transaction instanceof AbstractTransaction) {
            throw new \Exception('Only Transactions are allowed to be part of this collection', 1659668084);
        }
        $this->list[] = $transaction;
    }

    public function filterByPeriod(\DateTime $startDate, \DateTime $endDate) : array
    {
        $filtredTransactions = [];

        /** @var AbstractTransaction $transaction */
        foreach ($this->list as $transaction) {
            if($transaction->getTransactionDate() >= $startDate && $transaction->getTransactionDate() <= $endDate) {
                $filtredTransactions[] = $transaction;
            }
        }

        return $filtredTransactions;
    }

    public function filterByCompetence(\DateTime $competence)
    {
        $competenceCarbon = Carbon::createFromFormat('Y-m-d H:i:s.u', $competence->format('Y-m-d H:i:s.u'));
        return $this->filterByPeriod($competenceCarbon->startOfMonth(), $competenceCarbon->endOfMonth());
    }
}