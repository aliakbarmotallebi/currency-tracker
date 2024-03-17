<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use OpenApi\Attributes as OA;
#[OA\Schema(
    title: 'Request body for get access token',
    properties: [
        new OA\Property(property: 'amount', type: 'string'),
        new OA\Property(property: 'exchange_rate', type: 'string'),
        new OA\Property(property: 'category_id', type: 'integer', example: 'category by id'),
    ]
)]
class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|email',
            'exchange_rate' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
