<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('Show Login form when not logged in', function () {
    get(route('login'))
        ->assertSeeText([
            "Email Address",
            "Password",
            "Login"
        ]);
});
