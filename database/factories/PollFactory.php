<?php

namespace Database\Factories;

use App\Models\Poll;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PollFactory extends Factory
{
    protected $model = Poll::class;

    public function definition(): array
    {
        return [
          'title' => $this->faker->word,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ];
    }
}
