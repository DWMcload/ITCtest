<?php

namespace ITCtest\Models;

/**
 * Class Insurance
 * @package ITCtest\Models
 */
class Insurance implements \IteratorAggregate
{
    /**
     * @var string
     */
    public $id;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    public $type;
    /**
     * @var array
     */
    public $suppliers;

    /**
     * Insurance constructor.
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @param \stdClass $data
     */
    public function update(\stdClass $data)
    {
        $this->name = $data->name;
        $this->description = $data->description;
        $this->type = $data->type ?? '';
        $this->suppliers = $data->suppliers ?? [];
    }

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this);
    }
}