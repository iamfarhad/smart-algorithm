<?php

namespace App\Services;

use App\Exceptions\OutOfRangeException;
use App\Services\Abstracts\AlgorithmAbstract;

class IterativeStrategy extends AlgorithmAbstract
{
    private const MIN_RANGE = 0;

    private const MAX_RANGE = 1_000_000_000;

    public function __construct()
    {
    }

    /**
     * @throws OutOfRangeException
     */
    public function doAlgorithm(int $number): int
    {
        if ($number < 0 || $number > self::MAX_RANGE) {
            throw new OutOfRangeException();
        }
        $heap = [0, 1];

        for ($index = 2; $index <= $number; $index++) {
            $heap[] = $this->getSumOfSeparatedNumber($heap[$index - 1]) + $this->getSumOfSeparatedNumber($heap[$index - 2]);
        }

        return $heap[$number];
    }
}
