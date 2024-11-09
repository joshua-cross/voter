<?php


use App\Models\Poll;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Testing ability to get none-expired polls', function () {
    // Arrange
    Poll::factory()->notExpired()->create();

    // Act

    // Assert
    expect(Poll::active()->get())
        ->toHaveCount(1)
        ->first()->id->toEqual(1);
});
