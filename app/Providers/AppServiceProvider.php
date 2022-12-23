<?php

namespace App\Providers;

use App\Services\Abstracts\AlgorithmAbstract;
use App\Services\IterativeStrategy;
use App\Services\ModernStrategy;
use App\Services\RecursiveStrategy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(AlgorithmAbstract::class, IterativeStrategy::class);
        $this->app->bind(AlgorithmAbstract::class, RecursiveStrategy::class);
        $this->app->bind(AlgorithmAbstract::class, ModernStrategy::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
