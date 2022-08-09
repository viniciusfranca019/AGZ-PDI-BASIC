<?php

namespace Vini\PooPhp\Account\Domain\Model;

class SavingAccount extends AbstractAccount
{
    const ANNUAL_YIELD_RATE = 0.05;

    public function getAnnualYieldRate()
    {
        return self::ANNUAL_YIELD_RATE;
    }

    public function getActualAmount()
    {
        $amount = 0.0;
        $monthlyYieldRate = $this->getYieldCalculator()->calculateMonthlyYieldRateByAnual(self::ANNUAL_YIELD_RATE);
        $period = $this->getAllCompetencesSinceOpeningDate();

        foreach ($period as $competence) {
            $balance = $this->getTransactionPeriodCollection()
                ->getTransactionPeriodByCompetence($competence->toDateTime())
                ->getAmountBalanceFromPeriod();
            $amount = ($amount + $balance) * (1 + $monthlyYieldRate);
        }
    }
}