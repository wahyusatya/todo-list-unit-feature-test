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
        $response = $this->get(route('dashboard'));

        $response->assertStatus(200);
    }


    public function testCreateActivity(): void
    {
        $response = $this->get(route('dashboard'));

        $data = [
            'item' => 'Belajar Testing',
        ];

        $response = $this->post(route('item.store'), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('tasks', [
            'name' => 'Belajar Testing',
        ]);
    }
}
