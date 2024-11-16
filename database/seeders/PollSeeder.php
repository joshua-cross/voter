<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Poll;
use App\Models\Response;
use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    public function run(): void
    {
        Poll::factory(10)->expired()->create();
        Poll::factory(10)->has(Option::factory()->has(Response::factory(rand(0, 20)))->count(rand(2, 10)),
            'options')->private()->create();
        Poll::factory(150)->has(Option::factory()->has(Response::factory(rand(0, 20)))->count(rand(2, 10)),
            'options')->notExpired()->create();
    }
}
