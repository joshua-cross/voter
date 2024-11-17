<?php

use App\Models\Poll;
use App\Models\User;

use function Pest\Laravel\get;

it('gives back successful response for home', function () {
    // Act & Assert
    get(route('home'))
        ->assertOk();
});

it('gives a successful response back for the poll details page', function () {
    User::factory()->create();
    //Arrange
    $poll = Poll::factory()->notExpired()->create();
    // Act

    // Assert
    get(route("poll", $poll->id))
        ->assertOk();
});

it('gives a successful response for the user details page', function () {
    $user = User::factory()->create();
    // Arrange

    // Act

    // Assert
    get(route("user", $user->id))
        ->assertOk();
});


test('Gives a successful response for the registration page', function () {
    get(route('register'))
        ->assertOk();
});

test('Gives a successful response for the forgot password page', function () {
    get(route('forgot-password'))
        ->assertOk();
});

test('Gives a successful response for the poll results page', function () {
    $poll = Poll::factory()->notExpired()->create();
    get(route('results', $poll->id))
        ->assertOk();
});