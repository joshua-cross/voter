<?php

use App\Models\Poll;

use function Pest\Laravel\get;

it('gives back successful response for home', function () {
    // Act & Assert
    get(route('home'))
        ->assertOk();
});

it('gives a successful response back for the poll details page', function () {
    //Arrange
    $poll = Poll::factory()->notExpired()->create();
    // Act

    // Assert
    get(route("poll", $poll->id))
        ->assertOk();
});
