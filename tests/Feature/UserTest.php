<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_returns_a_successful_response_to_create_user()
    {
        $response = $this->post(
            route('users.store'),
            [
                'name' => 'juan xd',
                'email' => 'email@example.com',
                'password' => Hash::make('12345678'),
            ]
        );

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', ['email' => 'email@example.com']);
    }

    public function test_returns_a_successful_response_to_get_all_users()
    {
        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
    }

    public function test_returns_a_successful_response_to_get_user()
    {
        $user = User::where('email','email@example.com')->first();
        $response = $this->get(route('users.show', $user->id));

        $response->assertStatus(200);
    }

    public function test_returns_a_successful_response_to_update_user()
    {
        $user = User::where('email','email@example.com')->first();
        $response = $this->put(
            route('users.update', $user->id),
            [
                'name' => 'juan xd',
                'email' => 'email2@example.com',
                'password' => Hash::make('12345678'),
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', ['email' => 'email2@example.com']);
    }

    public function test_returns_a_successful_response_to_delete_user()
    {
        $user = User::where('email','email2@example.com')->first();
        $response = $this->delete(route('users.destroy', $user->id));

        $response->assertStatus(204);
    }
}
