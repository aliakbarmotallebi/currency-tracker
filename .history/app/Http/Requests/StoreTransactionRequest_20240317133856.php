<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use OpenApi\Attributes as OA;
#[OA\Schema(
    title: 'Request store transaction',
    properties: [
        new OA\Property(property: 'amount', type: 'string'),
        new OA\Property(property: 'exchange_rate', type: 'string'),
        new OA\Property(property: 'category_id', type: 'integer'),
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
            'amount' => 'required|regex:/^[0-9]+$/',
            'exchange_rate' => 'required|regex:/^[0-9]+$/',
            'category_id' => 'required|exists:currencies,id',
        ];
    }
}
