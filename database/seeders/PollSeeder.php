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
        Poll::factory(5)->has(Option::factory()->has(Response::factory(rand(0, 20))->withUser(User::factory()->create()))->count(rand(2, 10)),
            'options')->private()->create();
        Poll::factory(20)->has(Option::factory()->has(Response::factory(rand(0, 20))->withUser(User::factory()->create()))->count(rand(2, 10)),
            'options')->notExpired()->create();
    }
}
