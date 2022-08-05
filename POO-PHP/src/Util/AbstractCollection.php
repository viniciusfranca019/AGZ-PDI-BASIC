<?php

namespace Vini\PooPhp\Util;

use ArrayIterator;
use IteratorAggregate;

// https://www.sitepoint.com/creating-strictly-typed-arrays-collections-php/

abstract class AbstractCollection implements CollectionInterface
{
    protected array $list = [];

    /**
     * @param array $list
     */
    public function __construct(array $list)
    {
        $this->list = $list;
    }

    abstract public function add($element) : void;

    public function getList() : array
    {
        return $this->list;
    }
}