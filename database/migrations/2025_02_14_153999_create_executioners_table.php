<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('executioners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('android_id')->constrained();
            $table->foreignId('equipment_id')->constrained('armory');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('executioners');
    }
};
