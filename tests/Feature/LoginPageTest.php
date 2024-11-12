<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('Show Login form when not logged in', function () {
    get(route('login'))
        ->assertSeeText([
            "Email Address",
            "Password",
            "Login",
        ]);
});

it('Redirects if the user is already logged in', function () {
    $user = User::factory()->create();
    Auth::login($user);
    // Assert

    // act

    // get
    get(route("login"))
        ->assertStatus(302);
});
