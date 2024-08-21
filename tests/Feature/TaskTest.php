<?php

namespace Tests\Feature;

use Database\Factories\TaskFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_example(): void
    {
        TaskFactory::new()->count(5)->create();
        $response = $this->get('/tasks');
        $response->assertStatus(200);
    }
}
