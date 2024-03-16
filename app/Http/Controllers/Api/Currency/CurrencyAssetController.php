<?php

namespace App\Http\Controllers\Api\Currency;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class CurrencyAssetController extends Controller
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
        // ...
    }
}
