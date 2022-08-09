<?php

namespace Vini\PooPhp\Account\Domain\Model;

class SavingAccount extends AbstractAccount
{
    const ANNUAL_YIELD_RATE = 0.05;

    public function getAnnualYieldRate()
    {
        return self::ANNUAL_YIELD_RATE;
    }
}