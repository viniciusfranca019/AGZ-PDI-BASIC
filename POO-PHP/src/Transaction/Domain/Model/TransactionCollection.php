<?php

namespace Vini\PooPhp\Transaction\Domain\Model;

use Carbon\Carbon;
use Vini\PooPhp\Util\AbstractCollection;

class TransactionCollection extends AbstractCollection
{
    public function __construct(AbstractTransaction ...$transactionList)
    {
        parent::__construct($transactionList);
        $this->list = $transactionList;
    }

    public function add($element): void
    {
        if(!$element instanceof AbstractTransaction) {
            throw new \Exception('the item is not a Transaction', 54454324534);
        }

        $this->list[] = $element;
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

    public function getSumFromCollection()
    {
        $result = 0.0;
        foreach ($this->list as $transaction) {
            $result += $transaction->getAmount();
        }

        return $result;
    }
}