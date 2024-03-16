<?php

namespace App\Http\Controllers\Api\Transaction;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use OpenApi\Attributes as OA;

class TransactionsController extends Controller
{
    use ApiResponser;
    
    #[OA\Get(
        path: '/transactions',
        summary: 'Auth user and generating cookie header.',
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
