<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;
use OpenApi\Attributes\Items;

#[OA\Schema(
    title: 'Info currency resource',
    required: ['id', 'amount', 'exchangeRate', 'currency', 'createdAt', 'updatedAt'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'amount', type: 'string'),
        new OA\Property(property: 'exchange_rate', type: 'string'),
        new OA\Property(property: 'currency', type: 'object',
            properties: [
                new OA\Property(property: 'id', type: 'integer', example: 1),
                new OA\Property(property: 'name', type: 'string'),
            ]
        ),
        new OA\Property(property: 'createdAt', description: 'Date and time created comment as ISO format', type: 'string', example: '2023-04-29 19:00:58'),
        new OA\Property(property: 'updatedAt', description: 'Date and time updated comment as ISO format', type: 'string', example: '2023-04-29 19:00:58'),
    ],
)]
class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'exchangeRate' => $this->exchange_rate,
            'currency' => [
                'id' => $this->currency->id,
                'name' => $this->currency->name
            ],
            'createdAt' => (string)$this->created_at,
            'updatedAt' => (string)$this->updated_at,
        ];
    }
}