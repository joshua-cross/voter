<?php

use App\Models\Option;
use App\Models\Poll;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;
use function PHPUnit\Framework\assertTrue;

uses(RefreshDatabase::class);

it('Shows Poll List', function () {
    // Arrange
    $pollOne = Poll::factory()->create([
        'title' => "Poll A",
        'public' => true,
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
        'title' => 'Poll B',
        'public' => true
    ]);
    $optionsTwo = Option::factory()->createMany([
        [
            'title' => 'Poll B Option A',
            'poll_id' => $pollTwo->id
        ]
    ]);
    Poll::factory()->create([
        'title' => 'Poll C',
        'public' => true
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

it('Shows only public polls', function () {
    Poll::factory()->create(['title' => 'Poll A', 'public' => false]);
    Poll::factory()->create(['title' => 'Poll B', 'public' => true]);
    Poll::factory()->create(['title' => 'Poll C', 'public' => true]);

    get(route('home'))
        ->assertSeeText([
            'Poll B',
            'Poll C'
        ])
        ->assertDontSeeText([
            'Poll A'
        ]);
});


it('Shows only none-expired polls', function () {
    $now = Carbon::now();
    // 1 month in the future
    Poll::factory()->create(['title' => "Poll A", 'public' => true, 'expiry_date' => $now->addMonth()]);
    // 1 hour in the future
    Poll::factory()->create(['title' => "Poll B", 'public' => true, 'expiry_date' => $now->addHour()]);
    // in the past
    Poll::factory()->create(['title' => 'Poll C', 'public' => true, 'expiry_date' => $now->subYear(2)]);

    get(route('home'))
        ->assertSeeText([
            'Poll A',
            'Poll B'
        ])
        ->assertDontSeeText([
            'Poll C'
        ]);
});

it('Shows polls in creation order', function () {
    Poll::factory()->create(['title' => 'Poll A', 'public' => true, 'created_at' => Carbon::now()->subMonth()]);
    Poll::factory()->create(['title' => 'Poll B', 'public' => true, 'created_at' => Carbon::now()->subDay()]);
    Poll::factory()->create(['title' => 'Poll C', 'public' => true, 'created_at' => Carbon::now()->subMinute()]);

    get(route('home'))
        ->assertSeeTextInOrder([
            'Poll C',
            'Poll B',
            'Poll A'
        ]);
});
