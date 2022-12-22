<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecursiveAlgorithmTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_recursive_success_response_code(): void
    {
        $response = $this->get('/algorithm/recursive/7');

        $response->assertStatus(200);
    }

    public function test_recursive_out_of_range_status_code(): void
    {
        $response = $this->get('/algorithm/recursive/7000000000');

        $response->assertStatus(400);
    }

    public function test_iterative_success_response(): void
    {
        $response = $this->get('/algorithm/recursive/7');

        $response->assertStatus(200)->assertJson(
            [
                'succeed' => true,
                "message" => "messages.respond.successful_message",
                "results" => "13",
                "metas" => []
            ]
        );
    }

    public function test_iterative_out_of_range_response(): void
    {
        $response = $this->get('algorithm/recursive/2000000000');

        $response->assertStatus(400)->assertJson(
            [
                'succeed' => false,
                "message" => "The number is out of range",
                "results" => [],
                "metas" => []
            ]
        );
    }
}
