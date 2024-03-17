<?php

namespace App\Http\Controllers\Api\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use App\Traits\ApiResponser;
use OpenApi\Attributes as OA;

class TransactionStoreController extends Controller
{
    use ApiResponser;

    #[OA\Post(
        path: '/transactions/store',
        summary: 'To record currency receipt, which receives currency type, currency amount form user',
        requestBody: new OA\RequestBody(
            content: new OA\JsonContent(ref: StoreTransactionRequest::class)
        ),
        tags: ['Transaction'],
    )]
    #[OA\Response(
        response: 200,
        description: 'Success transactions',
        content: new OA\JsonContent( ref: TransactionResource::class),
    )]
    public function __invoke(
        StoreTransactionRequest $request,
        TransactionRepository $repository
    ){
        try{
            $repository->create($request->toArray());
            return $this->success(
                data : $repository->all(),
                code: 200,
                message: 'List transaction receipts'
            );
        }catch(\Exception $e){
            return $this->error(
                message : $e->getMessage(),
                code: 400);
        }

    }
}
