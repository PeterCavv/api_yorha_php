<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('assigned_androids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('android_id')->constrained();
            $table->foreignId('operator_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assigned_androids');
    }
};
