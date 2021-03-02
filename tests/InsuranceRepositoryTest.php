<?php

namespace ITCtest\Tests;

use ITCtest\Models\Insurance;
use ITCtest\Repositories\InsuranceRepository;
use PHPUnit\Framework\TestCase;

class InsuranceRepositoryTest extends TestCase
{
    public function testInsuranceRepositoryClassCanBeInitiated(): void
    {
        $insuranceRepository = new InsuranceRepository(new \stdClass());
        $this->assertInstanceOf(
            InsuranceRepository::class,
            $insuranceRepository);
    }

    public function testInsuranceRepositoryCanBeIterated(): void
    {
        $data = json_decode('{"combgap":"Combined GAP","smart":"SMART"}');
        $insuranceRepository = new InsuranceRepository($data);

        foreach ($insuranceRepository as $item)
        {
            $this->assertInstanceOf(Insurance::class, $item);
        }
    }
}