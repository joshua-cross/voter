<?php


use App\Models\Poll;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Testing ability to get none-expired polls', function () {
    // Arrange
    User::factory()->create();
    Poll::factory()->notExpired()->create();

    // Act

    // Assert
    expect(Poll::active()->get())
        ->toHaveCount(1)
        ->first()->id->toEqual(1);
});
