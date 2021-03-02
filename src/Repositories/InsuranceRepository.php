<?php

namespace ITCtest\Repositories;

use ITCtest\Models\Insurance;

class InsuranceRepository implements \IteratorAggregate
{
    private $items;

    public function __construct(\stdClass $items)
    {
        foreach ($items as $key => $item) {
            $this->items [] = new Insurance($key, $item);
        }
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }
}