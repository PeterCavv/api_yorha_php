<?php

namespace Database\Seeders;

use App\Models\Android;
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
        // User::factory(10)->create();

        $androids = [
            ['name' => 'Commander White', 'model_id' => '2', 'type_id' => '9', 'type_number' => '0', 'appearance_id' => '1', 'state_id' => '1', 'description' => 'Also know as just Commander, determines all large-scale strategies as well as directs, deploys, and oversees all units from her station at the Bunker outpost in Earths orbit.'],
            ['name' => 'Pepa', 'model_id' => '2', 'type_id' => '3', 'type_number' => '0', 'appearance_id' => '2', 'state_id' => '2', 'description' => 'Also know as just Commander, determines all large-scale strategies as well as directs, deploys, and oversees all units from her station at the Bunker outpost in Earths orbit.', 'assigned_operator' => '1']
        ];

        foreach ($androids as $android) {
            Android::create($android);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role_id' => '1',
            'android_id' => '1'
        ]);

    }
}
