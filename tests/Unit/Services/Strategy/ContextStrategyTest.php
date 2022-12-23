<?php

namespace Tests\Unit\Services\Strategy;

use App\Exceptions\OutOfRangeException;
use App\Services\Abstracts\AlgorithmAbstract;
use App\Services\IterativeStrategy;
use App\Services\Strategy\ContextStrategy;
use Mockery;
use Mockery\LegacyMockInterface;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use Tests\UnitTestCase;

class ContextStrategyTest extends UnitTestCase
{

    private LegacyMockInterface|MockInterface|AlgorithmAbstract|null $abstractStrategyMock;

    private ContextStrategy|null $contextStrategy;


    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function setUp(): void
    {
        parent::setUp();

        $this->abstractStrategyMock = Mockery::mock(IterativeStrategy::class);

        $this->contextStrategy = new ContextStrategy($this->abstractStrategyMock);
    }

    /**
     * @throws OutOfRangeException
     */
    public function test_context_success_response(): void
    {
        $this->abstractStrategyMock->expects('doAlgorithm')->twice()->withArgs([7])->andReturn(13);
        $getResponseFromAbstractMock = $this->abstractStrategyMock->doAlgorithm(7);

        $this->contextStrategy->setStrategy($this->abstractStrategyMock);
        $response = $this->contextStrategy->runAlgorithm(7);
        $this->assertEquals($response, $getResponseFromAbstractMock);
    }

    public function test_context_out_of_range_bigger_than_max_exception(): void
    {
        $this->abstractStrategyMock->expects('doAlgorithm')->once()->withArgs([1200000000])->andThrow(OutOfRangeException::class);

        $this->expectException(OutOfRangeException::class);

        $this->contextStrategy->setStrategy($this->abstractStrategyMock);
        $this->contextStrategy->runAlgorithm(1200000000);

        $this->expectExceptionMessage('The number is out of range');
    }

    public function test_context_out_of_range_smaller_than_min_exception(): void
    {

        $this->abstractStrategyMock->expects('doAlgorithm')->once()->withArgs([-1])->andThrow(OutOfRangeException::class);

        $this->expectException(OutOfRangeException::class);

        $this->contextStrategy->setStrategy($this->abstractStrategyMock);
        $this->contextStrategy->runAlgorithm(-1);

        $this->expectExceptionMessage("The number is out of range");
    }

    public function tearDown(): void
    {
        Mockery::close();
        $this->contextStrategy = null;
        $this->abstractStrategyMock = null;
    }
}
