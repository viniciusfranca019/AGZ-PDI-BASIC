<?php

namespace Vini\PooPhp\Account\Domain\Model;

class SavingAccount extends AbstractAccount implements YieldAccountInterface
{
    const ANNUAL_YIELD_RATE = 0.05;

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
}