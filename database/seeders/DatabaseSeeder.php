<?php

namespace Database\Seeders;

use App\Models\Android;
use App\Models\Executioner;
use App\Models\History;
use App\Models\Operator;
use App\Models\Operators;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $androids = [
            ['name' => 'Commander White', 'model_id' => '2', 'type_id' => '9', 'type_number' => '0', 'appearance_id' => '1', 'state_id' => '1', 'description' => 'Also know as just Commander, determines all large-scale strategies as well as directs, deploys, and oversees all units from her station at the Bunker outpost in Earths orbit.'],
            ['name' => 'Pepa', 'model_id' => '2', 'type_id' => '3', 'type_number' => '0', 'appearance_id' => '2', 'state_id' => '2', 'description' => 'Also know as just Commander, determines all large-scale strategies as well as directs, deploys, and oversees all units from her station at the Bunker outpost in Earths orbit.'],
            ['name' => 'YoRHa No.1 Type E', 'model_id' => '1', 'type_id' => '6', 'type_number' => '1', 'appearance_id' => '2', 'state_id' => '1', 'description' => 'Also know as just Commander, determines all large-scale strategies as well as directs, deploys, and oversees all units from her station at the Bunker outpost in Earths orbit.'],
            ['name' => 'YoRHa No.1 Type O', 'model_id' => '1', 'type_id' => '5', 'type_number' => '1', 'appearance_id' => '2', 'state_id' => '1', 'description' => 'Also know as just Commander, determines all large-scale strategies as well as directs, deploys, and oversees all units from her station at the Bunker outpost in Earths orbit.'],
        ];

        foreach ($androids as $android) {
            Android::create($android);
        }

        Executioner::factory()->create([
            'android_id' => '3',
            'equipment_id' => '1',
        ]);

        Operator::factory()->create([
            'android_id' => '4',
        ]);

        History::factory()->create([
            'executioner_id' => '1',
            'android_id' => '2',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role_id' => '1',
            'android_id' => '1'
        ]);

        $android = Android::first();

        Report::factory()->create([
            'android_id' => $android->id,
        ]);

    }
}
