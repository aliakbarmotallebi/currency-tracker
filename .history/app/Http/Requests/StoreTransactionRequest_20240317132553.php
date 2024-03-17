<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use OpenApi\Attributes as OA;
#[OA\Schema(
    title: 'Request body for get access token',
    properties: [
        new OA\Property(property: 'email', type: 'string', format: 'email', example: 'felix@example.net'),
        new OA\Property(property: 'password', type: 'string', example: 'password'),
        new OA\Property(property: 'device', type: 'string', example: 'swagger ui device'),
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
            'email' => 'required|email',
            'password' => 'required',
            'device' => 'required',
        ];
    }
}
