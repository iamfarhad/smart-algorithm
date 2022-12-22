<?php

namespace App\Services\Strategy;

use App\Services\Abstracts\AlgorithmAbstract;

class ContextStrategy
{
    public function __construct(private AlgorithmAbstract $strategy)
    {
    }

    public function setStrategy(AlgorithmAbstract $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function runAlgorithm(int $number): int
    {
        return $this->strategy->doAlgorithm($number);
    }
}
