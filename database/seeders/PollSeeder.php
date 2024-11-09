<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Poll;
use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    public function run(): void
    {
        Poll::factory(10)->expired()->create();
        Poll::factory(10)->has(Option::factory()->count(rand(2, 10)), 'options')->private()->create();
        Poll::factory(40)->has(Option::factory()->count(rand(2, 10)), 'options')->notExpired()->create();
    }
}
