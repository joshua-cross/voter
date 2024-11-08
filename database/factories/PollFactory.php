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
          'public' => $this->faker->boolean,
          'expiry_date' => Carbon::now()->addDay(),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ];
    }
}
