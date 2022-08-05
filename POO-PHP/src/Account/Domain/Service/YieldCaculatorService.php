<?php

namespace Vini\PooPhp\Account\Domain\Service;

class YieldCaculatorService
{
    const MONTHLY_RATE_CONVERTER = 1/12,
        HUNDRED_PERCENT_REPRESENTER = 1;

    public function calculateMonthlyYieldRateByAnual(float $anualYieldRate)
    {
        return ((self::HUNDRED_PERCENT_REPRESENTER + $anualYieldRate)) ** self::MONTHLY_RATE_CONVERTER - self::HUNDRED_PERCENT_REPRESENTER;
    }
}