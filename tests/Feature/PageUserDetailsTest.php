<?php

use App\Models\Poll;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it("Prints List of users details", function () {
    // Arrange
    $user = User::factory()->create();
    $polls = Poll::factory(10)->create(['user_id' => $user->id]);
    $otherUser = User::factory()->create();
    $otherUserPolls = Poll::factory(10)->create(['user_id' => $otherUser->id]);
    $otherUserPollsTitles = array_column($otherUserPolls->toArray(), "title");
    array_walk($otherUserPollsTitles, fn(&$item1) => $item1 = "<h2>$item1</h2>");
    $titles = [];
    $descriptions = [];
    $users = [];
    $expiryDates = [];
    $responseCounts = [];
    foreach ($polls as $poll) {
        $titles[] = "<h2>$poll->title</h2>";
        $descriptions[] = $poll->description;
        $expiryDates[] = $poll->formattedExpiryDate();
        $responseCounts[] = $poll->responseCount()." Responses";
    }

    // Act

    // Assert
    get(route("user", $user->id))
        ->assertSeeText([
            $user->name,
            ...$descriptions,
            ...$users,
            ...$expiryDates,
            ...$responseCounts,
        ])
        ->assertSeeHtml([
            ...$titles,
        ])
        ->assertDontSeeHtml([
            ...$otherUserPollsTitles,
        ]);
});

it('Prints no results found if user has created no polls', function () {});

it('Shows user controls e.g. edit if user is current user', function () {});
