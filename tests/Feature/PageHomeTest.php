<?php

use App\Models\Option;
use App\Models\Poll;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('Shows Poll List', function () {
    // Arrange
    $pollOne = Poll::factory()->has(Option::factory()->count(3))->notExpired()->create();
    $pollTwo = Poll::factory()->has(Option::factory()->count(1))->notExpired()->create();
    $pollThree = Poll::factory()->notExpired()->create();
    // Act

    // Assert
    get(route('home'))
        ->assertSeeText([
            $pollOne->title,
            $pollOne->options[0]->title,
            $pollOne->options[1]->title,
            $pollOne->options[2]->title,
            $pollTwo->title,
            $pollTwo->options[0]->title,
            $pollThree->title,
        ]);
});

it('Shows only public polls', function () {
    $firstPoll = Poll::factory()->private()->create();
    $secondPoll = Poll::factory()->public()->create();
    $lastPoll = Poll::factory()->public()->create();

    get(route('home'))
        ->assertSeeText([
            $lastPoll->title,
            $secondPoll->title,
        ])
        ->assertDontSeeText([
            $firstPoll->title,
        ]);
});


it('Shows only none-expired polls', function () {
    //Arrange
    $firstPoll = Poll::factory()->notExpired()->create();
    $secondPoll = Poll::factory()->notExpired()->create();
    $lastPoll = Poll::factory()->expired()->create();
    //Act
    //Assert
    get(route('home'))
        ->assertSeeText([
            $firstPoll->title,
            $secondPoll->title,
        ])
        ->assertDontSeeText([
            $lastPoll->title,
        ]);
});

it('Shows polls in creation order', function () {
    $firstPoll = Poll::factory()->create(['public' => true, 'created_at' => Carbon::now()->subMonth()]);
    $secondPoll = Poll::factory()->create(['public' => true, 'created_at' => Carbon::now()->subDay()]);
    $lastPoll = Poll::factory()->create(['public' => true, 'created_at' => Carbon::now()->subMinute()]);

    get(route('home'))
        ->assertSeeTextInOrder([
            $lastPoll->title,
            $secondPoll->title,
            $firstPoll->title,
        ]);
});
