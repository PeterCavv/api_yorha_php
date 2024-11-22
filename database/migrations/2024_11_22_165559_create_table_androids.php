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
        Schema::create('table_androids', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_name');
            $table->foreign('type')->references('name')->on('types');
            $table->integer('number_type');
            $table->foreign('model')->references('name')->on('models');
            $table->foreign('appearance')->references('name')->on('appearances');
            $table->foreign('status')->references('name')->on('statuses');
            $table->text('desc')->nullable();
            $table->foreignId('assigned_operator')->constrained('operators');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_androids');
    }
};
