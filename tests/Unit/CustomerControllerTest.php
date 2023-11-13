<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_customer_can_register()
    {
        $response = $this->postJson('/api/customers-register', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password123',
        ]);

        $response
            ->assertStatus(201)
            ->assertJson(['message' => 'Registration successful']);

        $this->assertDatabaseHas('customers', [
            'email' => 'johndoe@example.com',
        ]);
    }

    /** @test */
    public function registration_requires_valid_data()
    {
        $response = $this->postJson('/api/customers-register', [
            'name' => '',
            'email' => 'not-an-email',
            'password' => '123',
        ]);

        $response->assertStatus(400);
    }

    /** @test */
    public function a_customer_can_login()
    {
        $customer = Customer::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->postJson('/api/customers-login', [
            'email' => 'johndoe@example.com',
            'password' => 'password123',
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure(['access_token']);
    }

    /** @test */
    public function login_requires_valid_credentials()
    {
        $customer = Customer::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->postJson('/api/customers-login', [
            'email' => 'johndoe@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401);
    }
}
