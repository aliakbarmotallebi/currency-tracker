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
                'id',
                'name',
                'email',
                'createdAt',
                'updatedAt'
            ]
        ]);
    }
}
