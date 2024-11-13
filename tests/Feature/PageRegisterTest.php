<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('Redirects to the home page if the user is already logged in', function () {
    $user = User::factory()->create();
    Auth::login($user);

    get(route("register"))
        ->assertStatus(302);
});

it('Shows the register page if the user is not registered', function () {
    get(route("register"))
        ->assertSeeText("Registration");
});
