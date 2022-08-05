<?php

namespace Vini\PooPhp\Account\Domain\Model;

class InvestmentAccount extends AbstractAccount implements YieldInterface
{
    const ANNUAL_YIELD_RATE = 0.065;

    public function getYieldValue()
    {
        // TODO: Implement getYieldValue() method.
    }
    public function getLiquidYieldValue()
    {
        // TODO: Implement getLiquidYieldValue() method.
    }
}