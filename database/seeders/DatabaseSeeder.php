<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            "name" => "joshua cross",
            "email" => "josh@class-creative.com",
            "password" => Hash::make("classcreative25"),
        ]);
        User::factory(10)->create();
        $this->call(PollSeeder::class);
    }
}
