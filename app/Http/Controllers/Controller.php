<?php

namespace App\Http\Controllers;

use App\Exceptions\OutOfRangeException;
use App\Services\Abstracts\AlgorithmAbstract;
use App\Services\IterativeStrategy;
use App\Services\RecursiveStrategy;
use App\Services\Strategy\ContextStrategy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function index(ContextStrategy $context)
    {
//        $context->setStrategy(new RecursiveStrategy());
//        echo $context->runAlgorithm(40);

        echo '<br />';

        $context->setStrategy(new IterativeStrategy());
        echo $context->runAlgorithm(600_000_000);
    }
}
