<?php 

namespace App\Managers\CurrencyManagement;
class CurrencyManager {
    private $weightedAverageCalculator;

    public function __construct(WeightedAverageCalculatorInterface $weightedAverageCalculator) {
        $this->weightedAverageCalculator = $weightedAverageCalculator;
    }

    public function calculateWeightedAverage(array $amounts, array $exchangeRates): float {
        return $this->weightedAverageCalculator->calculate($amounts, $exchangeRates);
    }
}
