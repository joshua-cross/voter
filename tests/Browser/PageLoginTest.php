<?php

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;

uses(DatabaseTruncation::class);

test('Login with the correct details', function () {
    $user = User::factory()->create([
        'email' => 'taylor@laravel.com',
    ]);

    $this->browse(function (Browser $browser) use ($user) {
        $browser
            ->visit(route("login"))
            ->type('email', $user->email)
            ->type('password', 'password')
            ->press('Login')
            ->assertRouteIs("home");
    });
});

test('Login should fail with the incorrect details', function () {
    $user = User::factory()->create([
        'email' => 'taylor@laravel.com',
    ]);

    $this->browse(function (Browser $browser) use ($user) {
        $browser
            ->visit(route("login"))
            ->type('email', $user->email)
            ->type('password', 'wrong-password')
            ->press('Login')
            ->assertRouteIs("login")
            ->assertSee("These credentials do not match our records.");
    });
});

test("Errors should appear when you enter invalid email", function () {
    $user = User::factory()->create([
        'email' => 'taylor@laravel.com',
    ]);

    $this->browse(function (Browser $browser) use ($user) {
        $browser
            ->visit(route("login"))
            ->typeSlowly("email", "test")
            ->waitFor(".text-xs.text-red-500.mt-1", 1)
            ->assertSee("Please enter a valid email address");
    });
});
