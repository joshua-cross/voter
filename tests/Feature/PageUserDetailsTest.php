<?php

use App\Models\Poll;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it("Prints List of users details", function () {
    // Arrange
    $user = User::factory()->create();
    Poll::factory(10)->create(['user_id' => $user->id]);
    $polls = $user->polls;
    $otherUser = User::factory()->create();
    Poll::factory(10)->create(['user_id' => $otherUser->id]);
    $otherUserPolls = $otherUser->polls;
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

it('Prints no results found if user has created no polls', function () {
    $user = User::factory()->create();
    get(route("user", $user->id))
        ->assertSeeText("No Results are found");
});

it('Shows user controls e.g. edit if user is current user', function () {
    $currUser = User::factory()->create();
    $user = $currUser;
    get(route("user", $user->id))
        ->assertSeeText([
            "Edit Profile",
        ]);
});

it('Should show both expired and non-expired polls on the users profile page', function () {
    $user = User::factory()->create();
    $noneExpiredPolls = Poll::factory(5)->notExpired()->create(['user_id' => $user->id]);
    $expiredPolls = Poll::factory(5)->expired()->create(['user_id' => $user->id]);
    $titles = [];
    foreach ($noneExpiredPolls as $poll) {
        $titles = '<p class="text-sm/6 font-semibold text-gray-900">'.$poll->title.'</p>';
    }
    foreach ($expiredPolls as $poll) {
        $titles = '<p class="text-sm/6 font-semibold text-gray-900">'.$poll->title.'</p>';
    }
    get(route("user", $user->id))
        ->assertSeeHtml($titles);
});

it('Should not display private polls on profile page if not your profile', function () {
    $currUser = User::factory()->create();
    $user = User::factory()->create();
    $publicPolls = Poll::factory(8)->public()->create([
        "user_id" => $user->id,
    ]);
    $privatePolls = Poll::factory(2)->private()->create([
        "user_id" => $user->id,
    ]);
    $publicTitles = [];
    foreach ($publicPolls as $poll) {
        $publicTitles[] = '<p class="text-sm/6 font-semibold text-gray-900">'.$poll->title.'</p>';
    }
    $privateTitles = [];
    foreach ($privatePolls as $poll) {
        $privateTitles[] = '<p class="text-sm/6 font-semibold text-gray-900">'.$poll->title.'</p>';
    }
    get(route("user", $user->id))
        ->assertSeeHtml($publicTitles)
        ->assertDontSeeHtml($privateTitles);
});

it('Should show private polls on user page if this is your profile', function () {
    $currUser = User::factory()->create();
    $user = $currUser;
    $publicPolls = Poll::factory(8)->public()->create([
        "user_id" => $user->id,
    ]);
    $privatePolls = Poll::factory(2)->private()->create([
        "user_id" => $user->id,
    ]);
    $publicTitles = [];
    foreach ($publicPolls as $poll) {
        $publicTitles[] = '<p class="text-sm/6 font-semibold text-gray-900">'.$poll->title.'</p>';
    }
    $privateTitles = [];
    foreach ($privatePolls as $poll) {
        $privateTitles[] = '<p class="text-sm/6 font-semibold text-gray-900">'.$poll->title.'</p>';
    }
    get(route("user", $user->id))
        ->assertSeeHtml([
            ...$publicTitles,
            ...$privateTitles,
        ]);
});

it('Should only show 10 polls per pagination page', function () {
    $user = User::factory()->create();
    $polls = Poll::factory(30)->public()->create(["user_id" => $user->id])->toArray();
    $firstTenPollsTitles = [];
    $otherPollsTitles = [];
    for ($i = 0; $i < 10; $i++) {
        $firstTenPollsTitles[] = '<p class="text-sm/6 font-semibold text-gray-900">'.$polls[$i]['title'].'</p>';
    }
    for ($i = 10; $i < count($polls); $i++) {
        $otherPollsTitles[] = '<p class="text-sm/6 font-semibold text-gray-900">'.$polls[$i]['title'].'</p>';
    }

    get(route("user", $user->id))
        ->assertSeeHtml($firstTenPollsTitles)
        ->assertDontSeeHtml($otherPollsTitles);
});

it('Should not show user controls if current user is not the displayed user', function () {
    $currUser = User::factory()->create();
    $user = User::factory()->create();
    get(route("user", $user->id))
        ->assertDontSeeText([
            "Edit Profile",
        ]);
});
