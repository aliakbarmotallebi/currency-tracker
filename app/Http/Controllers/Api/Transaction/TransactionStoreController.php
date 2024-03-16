<?php

namespace App\Http\Controllers\Api\Transaction;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use OpenApi\Attributes as OA;

class TransactionStoreController extends Controller
{
    use ApiResponser;

    #[OA\Post(
        path: '/transactions/store',
        summary: 'Auth user and generating cookie header.',
        requestBody: new OA\RequestBody(
            content: new OA\JsonContent()
        ),
        tags: ['Transaction'],
    )]
    #[OA\Response(
        response: 200,
        description: 'Success auth',
        content: new OA\JsonContent(),
    )]
    public function __invoke(){
        // ...
    }
}
