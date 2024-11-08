<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('polls', function (Blueprint $table) {
            $table->dateTime('expiry_date', Carbon::now()->addDay());
        });
    }

    public function down(): void
    {
        Schema::table('polls', function (Blueprint $table) {
            //
        });
    }
};
