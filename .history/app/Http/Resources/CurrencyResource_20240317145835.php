<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use OpenApi\Attributes as OA;

#[OA\Schema(
    title: 'Info currency resource',
    required: ['id', 'name', 'createdAt', 'updatedAt'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'name', type: 'string'),
        new OA\Property(property: 'createdAt', description: 'Date and time created comment as ISO format', type: 'string', example: '2023-04-29 19:00:58'),
        new OA\Property(property: 'updatedAt', description: 'Date and time updated comment as ISO format', type: 'string', example: '2023-04-29 19:00:58'),
    ],
)]
class CurrencyResource extends JsonResource
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
            'name' => $this->name,
            'averageExchangeRate' => $this->whenNotNull($this->average_exchange_rate),
            'createdAt' => (string)$this->created_at,
            'updatedAt' => (string)$this->updated_at,
        ];
    }
}
