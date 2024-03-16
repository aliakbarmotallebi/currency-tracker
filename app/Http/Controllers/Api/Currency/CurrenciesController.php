<?php

namespace App\Http\Controllers\Api\Currency;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Traits\ApiResponser;
use OpenApi\Attributes as OA;

class CurrenciesController extends Controller
{
    use ApiResponser;
    
    #[OA\Get(
        path: '/currencies',
        summary: 'Auth user and generating cookie header.',
        tags: ['Currency'],
    )]
    #[OA\Response(
        response: 200,
        description: 'Success auth',
        content: new OA\JsonContent(),
    )]
    public function __invoke(){

    }
}
