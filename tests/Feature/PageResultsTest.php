<?php

use App\Models\Poll;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('Shows a button to go to the vote page if the user is signed in but has not voted', function () {
    $user = User::factory()->create();
    Auth::login($user);
    $poll = Poll::factory()->notExpired()->create();

    get(route('results', $poll->id))
        ->assertSeeText([
            'Not yet voted?',
            'Click here to vote'
        ]);
});

it('Does not show a vote button if the user is not logged in', function () {
    User::factory()->create();
    $poll = Poll::factory()->notExpired()->create();
    get(route('results', $poll->id))
        ->assertDontSeeText([
            'Not yet voted?',
            'Click here to vote'
        ])
        ->assertSeeText([
            'Register'
        ]);
});

it('Does not show vote button if the user is logged in but the poll has expired', function () {
    $user = User::factory()->create();
    $poll = Poll::factory()->expired()->create();
    Auth::login($user);
    get(route('results', $poll->id))
        ->assertDontSeeText([
            'Not yet voted?',
            'Click here to vote',
            'Register'
        ]);
});