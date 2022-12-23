<?php

namespace App\Services\Abstracts;

abstract class AlgorithmAbstract
{
    abstract public function doAlgorithm(int $number): int;

    protected function getSumOfSeparatedNumber($number): int
    {
        return array_sum(str_split($number));
    }
}
