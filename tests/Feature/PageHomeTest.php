<?php

use App\Models\Option;
use App\Models\Poll;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

use function Pest\Laravel\get;
use function PHPUnit\Framework\assertNotNull;

uses(RefreshDatabase::class);

it('Shows Poll List', function () {
    User::factory(10)->create();
    // Arrange
    $pollOne = Poll::factory()->has(Option::factory()->count(3))->notExpired()->create();
    $pollTwo = Poll::factory()->has(Option::factory()->count(1))->notExpired()->create();
    $pollThree = Poll::factory()->notExpired()->create();
    // Act

    assertNotNull([
        $pollOne->user,
        $pollTwo->user,
        $pollThree->user,
    ]);

    // Assert
    get(route('home'))
        ->assertSeeText([
            $pollOne->title,
            $pollOne->user->name,
            $pollOne->formattedExpiryDate(),
            $pollOne->responseCount()."Responses",
            $pollTwo->title,
            $pollTwo->formattedExpiryDate(),
            $pollTwo->user->name,
            $pollTwo->responseCount()."Responses",
            $pollThree->formattedExpiryDate(),
            $pollThree->user->name,
            $pollThree->expiry_date,
            $pollThree->responseCount()."Responses",
        ])
        // having to do like this as truncation messes up test but truncation is expected behaviour
        ->assertSeeHtml([
            '<p class="mt-1 truncate text-xs/5 text-gray-500">'.$pollOne->description.'</p>',
            '<p class="mt-1 truncate text-xs/5 text-gray-500">'.$pollTwo->description.'</p>',
            '<p class="mt-1 truncate text-xs/5 text-gray-500">'.$pollThree->description.'</p>',
        ]);
});

it('Shows login button on homepage when not logged in', function () {
    get(route("home"))
        ->assertSeeText("Login")
        ->assertSee(route("login"));
});

it('Shows logout button on homepage when logged in', function () {
    get(route("home"))
        ->assertSeeText("Logout")
        ->assertSee(route("logout"));
});

it('Shows no results found if no active polls are found', function () {
    get(route('home'))
        ->assertSeeText("No Results are found")
        ->assertDontSeeHtml('<ul role="list" class="divide-y divide-gray-100">');
});

it('Shows only public polls', function () {
    User::factory(10)->create();
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
    $yesterday = new Carbon();
    $yesterday = $yesterday::yesterday();
    User::factory(10)->create();
    $firstPoll = Poll::factory()->notExpired()->create();
    $secondPoll = Poll::factory()->notExpired()->create();
    $lastPoll = Poll::factory()->expired($yesterday)->create();
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
    User::factory(10)->create();
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
