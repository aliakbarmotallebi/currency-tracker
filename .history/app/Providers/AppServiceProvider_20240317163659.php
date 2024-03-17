<?php

namespace App\Providers;

use App\Helpers\WeightedAverageCalculator\WeightedAverageCalculator;
use App\Helpers\WeightedAverageCalculator\WeightedAverageCalculatorInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(WeightedAverageCalculatorInterface::class, WeightedAverageCalculator::class);
    }
}
