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
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
