<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('androids', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('resume_name')->nullable();
            $table->foreignId('state_id')->constrained();
            $table->foreignId('model_id')->constrained();
            $table->foreignId('type_id')->constrained();
            $table->integer('type_number');
            $table->foreignId('appearance_id')->constrained();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('androids');
    }
};
