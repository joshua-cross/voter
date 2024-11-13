<?php

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;

use function PHPUnit\Framework\assertEmpty;
use function PHPUnit\Framework\assertNotEmpty;

uses(DatabaseTruncation::class);

test('Register with correct details', function () {
    $this->browse(function (Browser $browser) {
        $browser
            ->visit(route("register"))
            ->type('name', "josh")
            ->type('email', "crossjoshua6@gmail.com")
            ->type('password', "password")
            ->type('password_confirmation', "password")
            ->press('Register');

        $user = User::where("email", "crossjoshua6@gmail.com")->first();
        assertNotEmpty($user);
    });
});

test('Register with missing fields', function () {
    $this->browse(function (Browser $browser) {
        $browser
            ->visit(route("register"))
            ->type("email", "crossjoshua6@gmail.com")
            ->type("password", "password")
            ->press('Register');

        $user = User::where("email", "crossjoshua6@gmail.com")->first();
        assertEmpty($user);
    });
});