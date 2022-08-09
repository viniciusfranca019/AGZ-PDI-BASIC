<?php

namespace Vini\PooPhp\Account\Domain\Model;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Vini\PooPhp\Transaction\Domain\Model\AbstractTransaction;
use Vini\PooPhp\Transaction\Domain\Model\DepositTransaction;
use Vini\PooPhp\Transaction\Domain\Model\RedemptionTransaction;

class InvestmentAccount extends AbstractAccount implements YieldAccountInterface
{
    const ANNUAL_YIELD_RATE = 0.065 + SavingAccount::ANNUAL_YIELD_RATE,
        ADM_RATE = 0.003,
        IR_TAX_BEFORE_6_MONTHS = 0.15,
        IR_TAX_AFTER_6_MONTHS = 0.075,
        HUNDRED_PERCENT = 1;

    public function doTransaction(AbstractTransaction $transaction, int $transactionOperator): void
    {
        if($transaction instanceof DepositTransaction && $transactionOperator > 0) {
            $this->amount += $transaction->getAmount() * $transactionOperator;
            $this->transactionPeriodCollection->getTransactionPeriodByCompetence($transaction->getTransactionDate())
                ->getAsReciverTransactionCollection()->add($transaction);
            return;
        }

        $this->validateRedemptionTransaction($transaction);

        $this->amount += $transaction->getAmount() * $transactionOperator;
        $this->transactionPeriodCollection->getTransactionPeriodByCompetence($transaction->getTransactionDate())
            ->getAsSenderTransactionCollection()->add($transaction);
    }

    public function getAnnualYieldRate()
    {
        return self::ANNUAL_YIELD_RATE;
    }

    public function getPresentValueAmount() : float
    {
        $amount = 0.0;
        $monthlyYieldRate = $this->getYieldCalculator()->calculateMonthlyYieldRateByAnual(self::ANNUAL_YIELD_RATE);
        $period = $this->getAllCompetencesSinceOpeningDate();

        foreach ($period as $competence) {
            $balance = $this->getTransactionPeriodCollection()
                ->getTransactionPeriodByCompetence($competence->toDateTime())
                ->getAmountBalanceFromPeriod();
            $amount = $amount * (1 + $monthlyYieldRate) + $balance;
        }

        return $amount;
    }

    public function getTotalContribution(): float
    {
        $amount = 0.0;
        $period = $this->getAllCompetencesSinceOpeningDate();

        foreach ($period as $competence) {
            $balance = $this->getTransactionPeriodCollection()
                ->getTransactionPeriodByCompetence($competence->toDateTime())
                ->getAmountBalanceFromPeriod();
            $amount += $balance;
        }

        return $amount;
    }

    public function getYield(): float
    {
        return $this->getPresentValueAmount() - $this->getTotalContribution();
    }

    private function getLiquidYield() : float
    {
        if($this->theOldestDepositHasMoreThen6Months()) {
            return ($this->getPresentValueAmount() - $this->getTotalContribution()) * (self::HUNDRED_PERCENT - self::IR_TAX_BEFORE_6_MONTHS - self::ADM_RATE);
        }

        return ($this->getPresentValueAmount() - $this->getTotalContribution()) * (self::HUNDRED_PERCENT - self::IR_TAX_AFTER_6_MONTHS - self::ADM_RATE);
    }

    private function theOldestDepositHasMoreThen6Months() : bool
    {
        $period = $this->getAllCompetencesSinceOpeningDate();
        foreach ($period as $competence) {
            $transactionPeriod = $this->getTransactionPeriodCollection()
                ->getTransactionPeriodByCompetence($competence->toDateTime());
            $balance = $transactionPeriod->getAmountBalanceFromPeriod();

            if($balance > 0 && ($competence->diffInMonths($transactionPeriod->getEndDate()) >= 6)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param AbstractTransaction $transaction
     * @return void
     * @throws \Exception
     */
    public function validateRedemptionTransaction(AbstractTransaction $transaction): void
    {
        if (!$transaction instanceof RedemptionTransaction) {
            throw new \Exception('a transacao nao e uma transacao de resgate ou deposito', 546848748748);
        }
        if ($transaction->getAmount() != ($this->getLiquidYield() + $this->getTotalContribution())) {
            throw new \Exception('Valor da transacao e diferente do valor liquido correto para o resgate', 54684874874811);
        }
    }
}