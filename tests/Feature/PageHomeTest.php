<?php

use App\Models\Option;
use App\Models\Poll;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;
use function PHPUnit\Framework\assertTrue;

uses(RefreshDatabase::class);

it('Shows Poll List', function () {
    // Arrange
    $pollOne = Poll::factory()->create([
        'title' => "Poll A",
    ]);
    $options = Option::factory()->createMany([
        [
            'title' => "Poll A Option A",
            'poll_id' => $pollOne->id
        ],
        [
            'title' => "Poll A Option B",
            'poll_id' => $pollOne->id
        ],
        [
            'title' => "Poll A Option C",
            'poll_id' => $pollOne->id
        ]
    ]);


    $pollTwo = Poll::factory()->create([
        'title' => 'Poll B'
    ]);
    $optionsTwo = Option::factory()->createMany([
        [
            'title' => 'Poll B Option A',
            'poll_id' => $pollTwo->id
        ]
    ]);
    Poll::factory()->create([
        'title' => 'Poll C'
    ]);
    // Act

    // Assert
    get(route('home'))
        ->assertOk()
        ->assertSeeText([
            'Poll A',
            'Poll A Option A',
            'Poll A Option B',
            'Poll A Option C',
            'Poll B',
            'Poll B Option A',
            'Poll C',
        ]);
});

it('Shows only active polls', function () {

});

it('Shows latest polls first', function () {

});
