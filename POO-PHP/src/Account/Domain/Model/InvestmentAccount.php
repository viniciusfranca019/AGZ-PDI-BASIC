<?php

namespace Vini\PooPhp\Account\Domain\Model;

class InvestmentAccount extends AbstractAccount
{
    const ANNUAL_YIELD_RATE = 0.065 + SavingAccount::ANNUAL_YIELD_RATE;

    public function getAnnualYieldRate()
    {
        return self::ANNUAL_YIELD_RATE;
    }
}