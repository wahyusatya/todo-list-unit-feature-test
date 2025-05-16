<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeatureTodoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testLoadHomePage(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(200);
    }


    public function testCreateActivity(): void
    {
        $response = $this->get('/dashboard');

        $data = [
            'item' => 'Belajar Testing',
        ];

        $response = $this->post('/item', $data);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $this->assertDatabaseHas('tasks', [
            'name' => 'Belajar Testing',
        ]);
    }
}
