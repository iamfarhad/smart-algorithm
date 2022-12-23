<?php

namespace Tests\Unit\Services\Strategy;

use App\Exceptions\OutOfRangeException;
use App\Services\Abstracts\AlgorithmAbstract;
use App\Services\IterativeStrategy;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use Tests\UnitTestCase;

class ModernStrategyTest extends UnitTestCase
{
    private AlgorithmAbstract|null $algorithmAbstract;

    public function setUp(): void
    {
        $this->algorithmAbstract = new \App\Services\ModernStrategy();
    }

    /**
     * @throws OutOfRangeException
     */
    public function test_modern_strategy_throw_exception_out_of_range_for_bigger_than_range(): void
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('The number is out of range');

        $this->algorithmAbstract->doAlgorithm(1200000000);
    }

    public function test_modern_strategy_throw_exception_out_of_range_for_smaller_than_range(): void
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('The number is out of range');

        $this->algorithmAbstract->doAlgorithm(-100);
    }

    /**
     * @throws OutOfRangeException
     */
    public function test_modern_success_result_for_data(): void
    {
        $data = [0, 1, 1, 2, 3, 5, 8, 13, 12, 7, 10, 8, 9];

        foreach ($data as $i => $iValue) {
            $calculate = $this->algorithmAbstract->doAlgorithm($i);
            $this->assertEquals($calculate, $iValue);
        }
    }

    /**
     * @throws OutOfRangeException
     */
    public function test_modern_failed_result_for_data(): void
    {
        $data = [30, 2, 8];

        foreach ($data as $i => $iValue) {
            $calculate = $this->algorithmAbstract->doAlgorithm($i);
            $this->assertNotEquals($calculate, $iValue);
        }
    }

    /**
     * @throws ReflectionException
     * @throws \ReflectionException
     */
    public function test_get_success_sum_of_separated_digits(): void
    {
        $method = new ReflectionMethod($this->algorithmAbstract, "getSumOfSeparatedNumber");
        /** @var TYPE_NAME $method */
        $method->setAccessible(true);

        $this->assertEquals(4, $method->invoke($this->algorithmAbstract, 13));
    }

    public function tearDown(): void
    {
        $this->algorithmAbstract = null;
    }

}
