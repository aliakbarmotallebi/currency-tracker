<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use OpenApi\Attributes as OA;

#[OA\Info(title: "Api Currency Tracker Documentation", version: "0.1")]
#[OA\Server(url: 'http://localhost:8000/api', description: "local server")]
class OpenApiController extends Controller
{
    use ApiResponser;
}
