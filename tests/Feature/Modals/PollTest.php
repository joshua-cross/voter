<?php


use App\Models\Poll;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('', function () {
    // Arrange
    Poll::factory()->notExpired()->create();


    // Act

    // Assert
    expect(Poll::notExpired()->get())
        ->toHaveCount(1)
        ->first()->id->toEqual(1);
});
