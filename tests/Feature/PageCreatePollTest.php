<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it("Redirects if the user is not logged in", function () {
    User::factory()->create();

    get(route("poll.create"))
        ->assertStatus(302);
});
