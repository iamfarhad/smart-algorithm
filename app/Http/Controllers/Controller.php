<?php

namespace App\Http\Controllers;

use App\Concerns\ApiResponse;
use App\Exceptions\OutOfRangeException;
use App\Services\Abstracts\AlgorithmAbstract;
use App\Services\IterativeStrategy;
use App\Services\ModernStrategy;
use App\Services\RecursiveStrategy;
use App\Services\Strategy\ContextStrategy;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use ApiResponse;
    use ValidatesRequests;

    public function recursive(ContextStrategy $context, $number): JsonResponse
    {
        try {
            $context->setStrategy(new RecursiveStrategy());
            $response = $context->runAlgorithm($number);
        } catch (Exception $exception) {
            return $this->respondWithError($exception->getMessage(), [], 400);
        }

        return $this->respond($response);
    }

    public function iterative(ContextStrategy $context, $number): JsonResponse
    {
        try {
            $context->setStrategy(new IterativeStrategy());
            $response = $context->runAlgorithm($number);
        } catch (Exception $exception) {
            return $this->respondWithError($exception->getMessage(), [], 400);
        }

        return $this->respond($response);
    }

    public function modern(ContextStrategy $context, $number): JsonResponse
    {
        try {
            $context->setStrategy(new ModernStrategy());
            $response = $context->runAlgorithm($number);
        } catch (Exception $exception) {
            return $this->respondWithError($exception->getMessage(), [], 400);
        }

        return $this->respond($response);
    }
}
