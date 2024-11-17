<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Poll;
use App\Models\Response;
use App\Models\User;
use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    public function run(): void
    {
        Poll::factory(5)->expired()->create();
        Poll::factory(5)->private()->create();
        Poll::factory(20)->notExpired()->create()->each(fn(Poll $poll) => $this->optionGenerator($poll));
    }

    public function optionGenerator(Poll $poll): void
    {
        $options = Option::factory(rand(2, 10))->create([
            'poll_id' => $poll->id,
        ])->each(fn(Option $option) => Response::factory(rand(1,
            15))->withOption($option)->withUser(User::factory()->create())->create());
    }
}
