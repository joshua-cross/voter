<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\Response;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ResponseFactory extends Factory
{
    protected $model = Response::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function withUser(User $user): self
    {
        return $this->state(
            fn(array $attributes) => [
                "user_id" => $user->id,
            ]
        );
    }

    public function withOption(Option $option): self
    {
        return $this->state(fn(array $attributes) => [
            "option_id" => $option->id
        ]);
    }
}
