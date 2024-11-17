<?php

use App\Models\Option;
use App\Models\Poll;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;
use function PHPUnit\Framework\assertCount;

uses(RefreshDatabase::class);

it('Displays Poll data on poll details page', function () {
    User::factory()->create();
    // Arrange
    $poll = Poll::factory()->has(Option::factory()->count(2), 'options')->notExpired()->create();
    // Act
    // Assert
    assertCount(2, $poll->options);
    get(route("poll", $poll->id))
        ->assertSeeText([
            $poll->title,
            $poll->description,
            $poll->responseCount()."Responses",
            $poll->user->name,
            $poll->expiry_date,
        ]);
});

it('Shows form on page where user is logged in', function () {
    $user = User::factory()->create();
    $poll = Poll::factory()->has(Option::factory()->count(2), 'options')->notExpired()->create();
    Auth::login($user);
    get(route("poll", $poll->id))
        ->assertSeeText("Submit Vote");
});


it('Does not show form on pages', function () {
    User::factory()->create();
    $poll = Poll::factory()->has(Option::factory()->count(2), 'options')->notExpired()->create();
    get(route("poll", $poll->id))
        ->assertSeeText(['Not Registered?'])
        ->assertDontSee("Submit Vote");
});