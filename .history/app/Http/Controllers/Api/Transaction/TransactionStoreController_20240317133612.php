<?php

namespace App\Http\Controllers\Api\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Traits\ApiResponser;
use OpenApi\Attributes as OA;

class TransactionStoreController extends Controller
{
    use ApiResponser;

    #[OA\Post(
        path: '/transactions/store',
        summary: 'To record currency receipt, which receives currency type, currency amount, and its conversion rate to Rial from the user',
        requestBody: new OA\RequestBody(
            content: new OA\JsonContent(ref: StoreTransactionRequest::class)
        ),
        tags: ['Transaction'],
    )]
    #[OA\Response(
        response: 200,
        description: 'Success transactions',
        content: new OA\JsonContent(),
    )]
    public function __invoke(StoreTransactionRequest $request)
    {
        // $request
        
    }
}
