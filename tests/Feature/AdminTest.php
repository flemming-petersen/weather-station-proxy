<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_basic_auth_without_credentials(): void
    {
        $response = $this->get('/admin');
        $response->assertStatus(401);
    }

    public function test_basic_auth_with_credentials(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->withBasicAuth('admin@test.com', 'password')->get('/admin');
        $response->assertStatus(200);
    }
}
