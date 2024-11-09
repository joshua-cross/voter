<?php

use App\Models\Option;
use App\Models\Poll;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;
use function PHPUnit\Framework\assertCount;

uses(RefreshDatabase::class);

it('Displays Poll data on poll details page', function () {
    // Arrange
    $poll = Poll::factory()->has(Option::factory()->count(2), 'options')->notExpired()->create();
    // Act
    // Assert
    assertCount(2, $poll->options);
    get(route("poll", $poll->id))
        ->assertSeeText([
            $poll->title,
            $poll->description,
            $poll->options[0]->title,
            $poll->options[1]->title,
        ]);
});
