<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('Redirects to the homepage when user is already logged in', function () {
    $user = User::factory()->create();
    Auth::login($user);
    get(route('register'))
        ->assertRedirectToRoute('home');
});

it('Displays form when user is not logged in', function () {
    get(route('register'))
        ->assertSeeText("Register");
});
//
//it('Errors when required fields not given', function () {});
//
//it('confirms when passwords do not match', function () {});
//
//it('Errors when emails do not match', function () {});
