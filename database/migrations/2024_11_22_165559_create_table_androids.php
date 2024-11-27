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
            $table->string('short_name')->nullable();
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('types');
            $table->integer('type_number');
            $table->unsignedBigInteger('model');
            $table->foreign('model')->references('id')->on('models');
            $table->unsignedBigInteger('appearance');
            $table->foreign('appearance')->references('id')->on('appearances');
            $table->unsignedBigInteger('status');
            $table->foreign('status')->references('id')->on('statuses');
            $table->text('desc')->nullable();
            $table->unsignedBigInteger('assigned_operator')->nullable();
            $table->foreign('assigned_operator')->references('id')
                ->on('androids');
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
