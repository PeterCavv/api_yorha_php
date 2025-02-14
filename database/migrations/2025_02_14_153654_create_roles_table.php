<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        DB::table('weapon_types')->insert([
            ['name' => 'ADMIN', 'description' => 'Admin'],
            ['name' => 'OPERATOR', 'description' => 'Operator'],
            ['name' => 'EXECUTIONER', 'description' => 'Executioner'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
