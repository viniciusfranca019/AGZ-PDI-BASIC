<?php

namespace Vini\PooPhp\Person\Domain\Model;

use Vini\PooPhp\Util\AbstractCollection;

class PeapleCollection extends AbstractCollection
{

    public function __construct(Individual ...$peapleList)
    {
        parent::__construct($peapleList);
    }

    public function add($individual) : void {
        if(!$individual instanceof Individual) {
            throw new \Exception('Only Individual are allowed to be part of this collection', 1659668084);
        }
        $this->list[] = $individual;
    }
}