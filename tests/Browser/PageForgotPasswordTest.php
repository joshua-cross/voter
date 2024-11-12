<?php

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;

uses(DatabaseTruncation::class);

test('Redirect the user if the correct details are provided', function () {
    $user = User::factory()->create();
    $this->browse(function (Browser $browser) use ($user) {
        $browser
            ->visit('/forgot-password')
            ->type('email', $user->email)
            ->press('Submit')
            ->assertPathIs('/forgot-password');
    });
});
