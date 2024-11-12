<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it("Redirects to the homepage if the user is logged in", function () {
    $user = User::factory()->create();
    Auth::login($user);
    get("/forgot-password")
        ->assertStatus(302);
});

it('SHows the forgot password form if the user is not logged in', function () {
    get("/forgot-password")
        ->assertSeeText("Forgot Password?");
});
