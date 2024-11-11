<?php

namespace Database\Factories;

use App\Models\Poll;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PollFactory extends Factory
{
    protected $model = Poll::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->word,
            'public' => $this->faker->boolean,
            'description' => $this->faker->paragraph,
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'expiry_date' => Carbon::now()->addDay(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function public(): self
    {
        return $this->state(
            fn($attributes)
                => [
                'public' => true,
            ],
        );
    }

    public function private(): self
    {
        return $this->state(
            fn($attributes)
                => [
                'public' => false,
            ],
        );
    }

    public function expired(?Carbon $date = null): self
    {
        return $this->state(
            fn($attributes)
                => [
                'expiry_date' => $date ?? Carbon::yesterday(),
                'public' => true,
            ],
        );
    }

    public function notExpired(?Carbon $date = null): self
    {
        return $this->state(
            fn($attributes)
                => [
                'expiry_date' => $date ?? Carbon::tomorrow(),
                'public' => true,
            ],
        );
    }
}
