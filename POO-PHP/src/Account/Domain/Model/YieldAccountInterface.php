<?php

namespace Vini\PooPhp\Account\Domain\Model;

interface YieldAccountInterface
{
    public function getPresentValueAmount() : float;

    public function  getYield() : float;

    public function getTotalContribution() : float;
}