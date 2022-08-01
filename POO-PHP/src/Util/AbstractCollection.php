<?php

namespace Vini\PooPhp\Util;

use IteratorAggregate;

// https://www.sitepoint.com/creating-strictly-typed-arrays-collections-php/

abstract class AbstractCollection implements IteratorAggregate
{
    protected array $list;

    public function getIterator()
    {
        return new \ArrayIterator($this->list);
    }
}