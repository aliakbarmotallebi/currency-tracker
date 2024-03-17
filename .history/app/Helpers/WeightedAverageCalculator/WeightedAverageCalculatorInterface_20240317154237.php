<?php 
namespace App\Helpers\WeightedAverageCalculator;
interface WeightedAverageCalculatorInterface {
    public function calculate(array $amounts, array $exchangeRates): float;
}
