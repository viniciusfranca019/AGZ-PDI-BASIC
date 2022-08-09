<?php

namespace Vini\PooPhp\Account\Domain\Model;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Vini\PooPhp\Account\Domain\Service\YieldCaculatorService;
use Vini\PooPhp\Person\Domain\Model\AbstractPerson;
use Vini\PooPhp\Transaction\Domain\Model\AbstractTransaction;
use Vini\PooPhp\Transaction\Domain\Model\TransactionCollection;
use Vini\PooPhp\Transaction\Domain\Model\TransactionPeriodCollection;

abstract class AbstractAccount
{
    protected AbstractPerson $owner;
    protected \DateTime $openingDate;
    protected TransactionPeriodCollection $transactionPeriodCollection;
    protected float $amount = 0.0;

    /**
     * @param AbstractPerson $owner
     */
    public function __construct(AbstractPerson $owner, \DateTime $openingDate)
    {
        $this->owner = $owner;
        $this->openingDate = $openingDate;
    }

    public function doTransaction(AbstractTransaction $transaction, int $transactionOperator) : void
    {
        if($transactionOperator > 0) {
            $this->amount += $transaction->getAmount() * $transactionOperator;
            $this->transactionPeriodCollection->getTransactionPeriodByCompetence($transaction->getTransactionDate())
                ->getAsReciverTransactionCollection()->add($transaction);
            return;
        }
        $this->amount += $transaction->getAmount() * $transactionOperator;
        $this->transactionPeriodCollection->getTransactionPeriodByCompetence($transaction->getTransactionDate())
            ->getAsSenderTransactionCollection()->add($transaction);
    }

    protected function getAllCompetencesSinceOpeningDate() : CarbonPeriod
    {
        return CarbonPeriod::create(
            $this->openingDate->format('yyyy-MM-dd'),
            '1 month',
            Carbon::now()->toDateTime()->format('yyyy-MM-dd')
        );
    }

    /**
     * @return TransactionPeriodCollection
     */
    protected function getTransactionPeriodCollection(): TransactionPeriodCollection
    {
        return $this->transactionPeriodCollection;
    }

    protected function getYieldCalculator()
    {
        return new YieldCaculatorService();
    }
}