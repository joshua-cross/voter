<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

test('', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('Redirects to the homepage when user is already logged in', function () {
    get(route('login'))
        ->assertRedirectToRoute('home');
});

it('Displays form when user is not logged in', function () {
    get(route('login'))
        ->assertSeeText("Register");
});

it('Errors when required fields not given', function () {

});

it('confirms when passwords do not match', function () {

});

it('Errors when emails do not match', function () {

});