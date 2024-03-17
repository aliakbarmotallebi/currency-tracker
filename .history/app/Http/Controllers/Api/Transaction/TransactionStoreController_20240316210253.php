<?php

namespace App\Http\Controllers\Api\Transaction;

use App\DTO\Request\Api\StoreTransactionRequestDto;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use OpenApi\Attributes as OA;

class TransactionStoreController extends Controller
{
    use ApiResponser;

    #[OA\Post(
        path: '/transactions/store',
        summary: 'To record currency receipt, which receives currency type, currency amount, and its conversion rate to Rial from the user',
        requestBody: new OA\RequestBody(
            content: new OA\JsonContent(ref: StoreTransactionRequestDto::class)
        ),
        tags: ['Transaction'],
    )]
    #[OA\Response(
        response: 200,
        description: 'Success auth',
        content: new OA\JsonContent(),
    )]
    public function __invoke(){
       
        
    }
}
