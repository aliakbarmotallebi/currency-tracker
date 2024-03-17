<?php

namespace App\Http\Controllers\Api\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyResource;
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
        description: 'Success',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: 'message',
                    type: 'string'
                ),
                new OA\Property(property: 'data', type: 'object', ref: CurrencyResource::class),
                new OA\Property(
                    property: 'status',
                    type: 'string'
                ),
            ]
        ),
    )]
    public function __invoke(
        Currency $currency
    ){
        return $this->success(
            data : new CurrencyResource($currency),
            code: 200
        );
    }
}
