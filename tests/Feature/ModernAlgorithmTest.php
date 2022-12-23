<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModernAlgorithmTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_modern_success_response_code(): void
    {
        $response = $this->get('/algorithm/modern/1000000000');

        $response->assertStatus(200);
    }

    public function test_modern_out_of_range_status_code(): void
    {
        $response = $this->get('/algorithm/modern/7000000000');

        $response->assertStatus(400);
    }

    public function test_modern_success_response(): void
    {
        $response = $this->get('/algorithm/modern/7');

        $response->assertStatus(200)->assertJson(
            [
                'succeed' => true,
                "message" => "messages.respond.successful_message",
                "results" => "13",
                "metas" => []
            ]
        );
    }

    public function test_modern_out_of_range_response(): void
    {
        $response = $this->get('algorithm/modern/2000000000');

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
