<?php

namespace ITCtest\Models;

class Insurance implements \IteratorAggregate
{
    public $id;
    public $name;
    public $description;
    public $type;
    public $suppliers;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function update(\stdClass $data)
    {
        $this->name = $data->name;
        $this->description = $data->description;
        $this->type = $data->type ?? '';
        $this->suppliers = $data->suppliers ?? [];
    }

    public function getIterator() {
        return new \ArrayIterator($this);
    }
}