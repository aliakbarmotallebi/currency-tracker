<?php

namespace App\Http\Controllers\Api\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
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
        content: new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: 'message',
                    type: 'string'
                ),
                new OA\Property(property: 'data', type: 'array', items: new OA\Items(ref: TransactionResource::class)),
                new OA\Property(
                    property: 'status',
                    type: 'string'
                ),
            ])
    )]
    public function __invoke(
     TransactionRepository $repository   
    ){
        return $this->success(
            data : TransactionResource::collection($repository->all()),
            code: 200,
            message: 'List transaction receipts'
        );
    }
}
