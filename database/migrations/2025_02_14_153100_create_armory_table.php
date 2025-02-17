<?php

use App\Models\WeaponType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('armory', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('weapon_type_id')->constrained('weapon_types');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('armory')->insert([
            [
                'name' => 'YoRHa-issue Blade',
                'weapon_type_id' => WeaponType::whereIn('name', ['SMALL_SWORDS'])->get()->first()->id,
                'description' => 'This common blade is a standard-issue weapon given to all YoRHa troops.',
            ],
            [
                'name' => 'Cruel Oath',
                'weapon_type_id' => WeaponType::whereIn('name', ['SMALL_SWORDS'])->get()->first()->id,
                'description' => 'A black oriental sword. Its no-frills design gives it an aura of serious weaponry.'
            ],
            [
                'name' => 'Virtuous Contract',
                'weapon_type_id' => WeaponType::whereIn('name', ['SMALL_SWORDS'])->get()->first()->id,
                'description' => 'A white sword like those carried by the samurai of old. Looks flashy but the blade is top quality.'
            ],
            [
                'name' => 'Virtuous Dignity',
                'weapon_type_id' => WeaponType::whereIn('name', ['SPEARS'])->get()->first()->id,
                'description' => 'This pure white spear shines with the pride of the haughty samurai who once bore it.'
            ],
            [
                'name' => 'Bare fist',
                'weapon_type_id' => WeaponType::whereIn('name', ['COMBAT_BRACERS'])->get()->first()->id,
                'description' => 'Bare android fists are passable weapones, but it can be difficult to land effective blows with them.'
            ],
            [
                'name' => 'Virtuous Treaty',
                'weapon_type_id' => WeaponType::whereIn('name', ['LARGE_SWORDS'])->get()->first()->id,
                'description' => "This samurai sword's pure white blade is not yet sullied by a single drop of blood."
            ],
            [
                'name' => 'Beastlord',
                'weapon_type_id' => WeaponType::whereIn('name', ['LARGE_SWORDS'])->get()->first()->id,
                'description' => "Bearing a bestial design, this sword cuts down any who would challenge its bearer's authority."
            ]
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('armory');
    }
};
