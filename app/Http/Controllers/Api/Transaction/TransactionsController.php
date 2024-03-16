<?php

namespace App\Http\Controllers\Api\Transaction;

use App\Http\Controllers\Controller;
use App\Repositories\TransactionRepository;
use App\Traits\ApiResponser;
use OpenApi\Attributes as OA;

class TransactionsController extends Controller
{
    use ApiResponser;
    
    #[OA\Get(
        path: '/transactions',
        summary: 'It lists receipts, including which currency,with rate',
        tags: ['Transaction'],
    )]
    #[OA\Response(
        response: 200,
        description: 'Success auth',
        content: new OA\JsonContent(),
    )]
    public function __invoke(
     TransactionRepository $transactionRepository   
    ){
        return $this->success(
            data : $transactionRepository->all(),
            code: 200,
            message: 'List transaction receipts'
        );
    }
}
