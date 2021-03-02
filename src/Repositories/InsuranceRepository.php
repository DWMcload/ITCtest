<?php

namespace ITCtest\Repositories;

use ITCtest\Models\Insurance;

/**
 * Class InsuranceRepository
 * @package ITCtest\Repositories
 */
class InsuranceRepository implements \IteratorAggregate
{
    /**
     * @var
     */
    private $items;

    /**
     * InsuranceRepository constructor.
     * @param \stdClass $items
     */
    public function __construct(\stdClass $items)
    {
        foreach ($items as $key => $item) {
            $this->items [] = new Insurance($key, $item);
        }
    }

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }
}