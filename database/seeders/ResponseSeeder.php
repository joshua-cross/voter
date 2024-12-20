<?php

namespace Database\Seeders;

use App\Models\Response;
use Illuminate\Database\Seeder;

class ResponseSeeder extends Seeder
{
    public function run(): void
    {
        Response::factory(100)->create();
    }
}
