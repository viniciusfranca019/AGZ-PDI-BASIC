<?php

namespace Vini\PooPhp\Transaction\Domain\Model;

use Carbon\Carbon;

class TransactionPeriodCollection extends \Vini\PooPhp\Util\AbstractCollection
{

    public function __construct(TransactionPeriod ...$transactionPeriodList)
    {
        parent::__construct($transactionPeriodList);
        $this->list = $transactionPeriodList;
    }
    public function add($element): void
    {
        if(!$element instanceof TransactionPeriod) {
            throw new \Exception('the item is not a Transaction period', 54454324539);
        }

        $this->list[] = $element;
    }

    public function getTransactionPeriodByCompetence(\DateTime $competence)
    {
        $competenceCarbon = Carbon::createFromFormat('Y-m-d H:i:s.u', $competence->format('Y-m-d H:i:s.u'));

        /** @var TransactionPeriod $transactionPeriod */
        foreach ($this->list as $transactionPeriod) {
            if($transactionPeriod->getStartDate() >= $competenceCarbon->startOfMonth()
                && $transactionPeriod->getEndDate() <= $competenceCarbon->endOfMonth()) {
                return $transactionPeriod;
            }
        }
    }
}