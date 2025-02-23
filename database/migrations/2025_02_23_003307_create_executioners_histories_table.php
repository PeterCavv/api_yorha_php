<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('executioners_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('executioner_id')->constrained();
            $table->foreignId('history')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('executioners_histories');
    }
};
