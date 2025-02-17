<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('executioner_id')->constrained();
            $table->foreignId('android_id')->constrained();
            $table->timestamp('execution_date');
            $table->text('summary');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
