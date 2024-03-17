<?php

namespace App\Http\Controllers\Api\Currency;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyResource;
use App\Repositories\CurrencyRepository;
use App\Traits\ApiResponser;
use OpenApi\Attributes as OA;


class CurrenciesController extends Controller
{
    use ApiResponser;
    
    #[OA\Get(
        path: '/currencies',
        summary: 'List of available and active currencies in the system.',
        tags: ['Currency'],
    )]
    #[OA\Response(
        response: 200,
        description: 'Success 200',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: 'message',
                    type: 'string'
                ),
                new OA\Property(
                    description: 'Collection of users',
                    ref: CurrencyResource::class
                ),
                new OA\Property(
                    property: 'code',
                    type: 'integer'
                ),
            ]
        ),
    )]
    public function __invoke(
        CurrencyRepository $repository
    ){
        return $this->success(
            data : $repository->confirmedCurrencyList(),
            code: 200,
            message: 'List Currencies'
        );
    }
}
