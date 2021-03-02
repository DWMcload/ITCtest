<?php

namespace ITCtest\Tests;

use PHPUnit\Framework\TestCase;
use ITCtest\Models\Insurance;

class InsuranceTest extends TestCase
{
    public $insurance;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->insurance = new Insurance('id', 'name');
        parent::__construct($name, $data, $dataName);
    }

    public function testInsuranceClassCanBeInitiated(): void
    {
        $this->assertInstanceOf(
            Insurance::class,
            $this->insurance);
    }

    public function testInsuranceClassCanBeUpdated(): void
    {
        $object = new \stdClass();
        $object->name = 'new';
        $object->description = 'lorem ipsum dolor';
        $this->insurance->update($object);
        $this->assertEquals('new', $this->insurance->name);
        $this->assertEquals('lorem ipsum dolor', $this->insurance->description);
    }

    public function testInsuranceCanBeIterated(): void
    {
        $expected = ['id' => "id", 'name' => "name", 'description' => NULL, 'type' => NULL, 'suppliers' => NULL];
        $this->assertEquals($expected, iterator_to_array($this->insurance));
    }
}
