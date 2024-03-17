<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    public function test_get_list_transactions(): void
    {
        $response = $this->get('/api/transactions');

        $response->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'data' => [
                '*' => [
                    'id',
                    'amount',
                    'exchangeRate',
                    'currency' => [
                        'id',
                        'name',
                    ],
                    'createdAt',
                    'updatedAt'
                ]
            ]
        ]);
    }

    public function test_store_transaction(): void
    {
        $data = ['amount' => '20000', 'exchange_rate' => '40000', 'currency_id' => '2'];
        $this->post('api/transactions/store', $data)
            ->assertStatus(201)
            ->assertJsonStructure([
                'message',
                'data' => [
                    'id',
                    'amount',
                    'exchangeRate',
                    'currency' => [
                        'id',
                        'name',
                    ],
                    'createdAt',
                    'updatedAt'
                ]
            ]);
    }
}
