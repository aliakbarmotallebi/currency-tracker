<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CurrencyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_main(): void
    {
        $response = $this->get('/');

        $response->assertStatus(404);
    }


    public function test_get_list_currencies(): void
    {
        $response = $this->get('/api/currencies');

        $response->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'createdAt',
                    'updatedAt'
                ]
            ]
        ]);
    }

    public function test_get_currency_with_total_amount_and_(): void
    {
        $response = $this->get('api/transactions/currency/1');

        $response->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'data' => [
                'id',
                'name',
                'amountTotal',
                'averageExchangeRate',
                'createdAt',
                'updatedAt'
            ]
        ]);
    }
}
