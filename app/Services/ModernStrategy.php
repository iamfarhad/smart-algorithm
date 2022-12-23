<?php

namespace App\Services;

use App\Exceptions\OutOfRangeException;
use App\Services\Abstracts\AlgorithmAbstract;

class ModernStrategy extends AlgorithmAbstract
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

        if ($number < 2) {
            return $number;
        }

        $sequencePointer = $number;

        if ($number > 24) {
            $sequencePointer = (($number % 24));
        }

        return $this->getSumOfSeparatedNumber($this->doAlgorithm($sequencePointer - 1)) + $this->getSumOfSeparatedNumber($this->doAlgorithm($sequencePointer - 2));
    }
}
