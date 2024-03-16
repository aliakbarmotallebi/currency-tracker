<?php

namespace App\Http\Controllers\Api\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Repositories\CurrencyRepository;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class AverageRatePerCurrencyController extends Controller
{
    use ApiResponser;

    #[OA\Get(
        path: '/transactions/currency/{currency}',
        summary: 'represents the average rate for each currency',
        tags: ['Transaction'],
    )]
    #[OA\Parameter(name: 'currency', in: 'path')]
    #[OA\Response(
        response: 200,
        description: 'Success auth',
        content: new OA\JsonContent(),
    )]
    public function __invoke(
        Currency $currency,
        CurrencyRepository $currencyRepository
    ){
        return $this->success(
            data : $currencyRepository->findWithAverageWeightedRate($currency),
            code: 200
        );
    }
}
