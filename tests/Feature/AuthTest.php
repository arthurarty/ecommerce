<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
    }

    /**
     * Test of successful user sign up.
     * 
     * Required fields: name, email, password
     * 
     * @return void
    */
    public function testSuccessfulSignUp()
    {
        $response = $this->postJson('/api/auth/signup', [
            "name" => "test_user",
            "email" => "test@example.com",
            "password" => "password",
            "password_confirmation" => "password"
        ]);
        $response->assertStatus(201);
    }
}
