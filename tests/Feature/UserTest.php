<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp() : void
    {
        parent::setUp();
        $this->user = User::factory()->create();;
    }

    public function testSuccessRegister()
    {
        $this->post('/register', [
            'name' => 'TestUser',
            'email' => 'testUser@mail.ru',
            'password' => 'password2',
            'password_confirmation' => 'password2',
        ]);

        $this->assertAuthenticated();
    }

    public function testFailedNameRegister()
    {
        $this->post('/register', [
            'name' => 12345,
            'email' => 'testUser2@mail.ru',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertGuest();
    }

    public function testFailedEmailRegister()
    {
        $this->post('/register', [
            'name' => 'TestUser3',
            'email' => 'testUser3',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertGuest();
    }

    public function testFailedPasswordRegister()
    {
        $this->post('/register', [
            'name' => 'TestUser3',
            'email' => 'testUser3@mail.ru',
            'password' => 'pas',
            'password_confirmation' => 'pas',
        ]);

        $this->assertGuest();
    }

    public function testFailedPasswordConfirmRegister()
    {
        $this->post('/register', [
            'name' => 'TestUser3',
            'email' => 'testUser3@mail.ru',
            'password' => 'password',
            'password_confirmation' => 'passwordpas',
        ]);

        $this->assertGuest();
    }

    public function testSuccessLogin()
    {
        $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
    }

    public function testFailedPasswordLogin()
    {
        $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function testIncorrectEmailLogin()
    {
        $this->post('/login', [
            'email' => 'email',
            'password' => 'password',
        ]);

        $this->assertGuest();
    }

    public function testNotExistEmailLogin()
    {
        $this->post('/login', [
            'email' => 'emailTestUser@mail.ru',
            'password' => 'password',
        ]);

        $this->assertGuest();
    }
}
