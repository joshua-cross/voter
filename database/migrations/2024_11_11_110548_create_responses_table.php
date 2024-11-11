<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger("opportunity_id");
            $table->foreign("opportunity_id")->references("id")->on("opportunities");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
