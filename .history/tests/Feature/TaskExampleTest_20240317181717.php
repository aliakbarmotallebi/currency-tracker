<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskExampleTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_calculate_total_dollars_and_weighted_average_rate(): void
    {
        $data = ['amount' => '1000', 'exchange_rate' => '500000', 'currency_id' => '1'];
        $responseStore = $this->post('/api/transactions/store', $data);
        $responseStore->assertStatus(201);
        $responseStore->assertHeader('Content-Type', 'application/json');

        $data = ['amount' => '600', 'exchange_rate' => '550000', 'currency_id' => '1'];
        $responseStore = $this->post('/api/transactions/store', $data);
        $responseStore->assertStatus(201);
        $responseStore->assertHeader('Content-Type', 'application/json'); 

         $responseTransactions = $this->get('/api/transactions');
         $responseTransactions->assertStatus(200); 
         $responseTransactions->assertHeader('Content-Type', 'application/json');
         $responseTransactions->assertJsonCount(2, 'data');
 
         $responseCurrency = $this->get('/api/transactions/currency/1');
         $responseCurrency->assertStatus(200); 
         $responseCurrency->assertHeader('Content-Type', 'application/json');
         $responseCurrency->assertJsonFragment(['amountTotal' => 1600]);
         $responseCurrency->assertJsonFragment(['averageExchangeRate' => 518750]); 
    }


}
