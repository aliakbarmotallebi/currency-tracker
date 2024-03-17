<?php
namespace App\Helpers\WeightedAverageCalculator;

use App\Helpers\WeightedAverageCalculator\WeightedAverageCalculatorInterface;

class WeightedAverageCalculator implements WeightedAverageCalculatorInterface {
    public function calculate(array $amounts, array $exchangeRates): float {
        $totalAmount = 0;
        $totalDollars = array_sum($amounts);
        
        foreach ($amounts as $key => $amount) {
            $totalAmount += $amount * $exchangeRates[$key];
        }
        
        if ($totalDollars > 0) {
            return $totalAmount / $totalDollars;
        } else {
            return 0;
        }
    }
}
