<?php

namespace Vini\PooPhp\Util;

// https://phpstan.org/blog/generics-in-php-using-phpdocs

interface CollectionInterface
{
    public function add($element) : void;
}