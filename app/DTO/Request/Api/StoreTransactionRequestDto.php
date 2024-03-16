<?php

namespace App\DTO\Request\Api;

use OpenApi\Attributes as OA;

#[OA\Schema]
final class StoreTransactionRequestDto
{
    #[OA\Property]
    public string $amount;

    #[OA\Property]
    public string $exchange_rate;

    #[OA\Property(format: 'int')]
    public string $category_id;
}
