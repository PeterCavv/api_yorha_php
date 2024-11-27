<?php

namespace Database\Seeders;

use App\Models\Android;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $androids = [
            ['name' => 'Commander White', 'model' => '2', 'type' => '9', 'type_number' => '0', 'appearance' => '1', 'status' => '1', 'desc' => 'Also know as just Commander, determines all large-scale strategies as well as directs, deploys, and oversees all units from her station at the Bunker outpost in Earths orbit.'],
            ['name' => 'Pepa', 'model' => '2', 'type' => '3', 'type_number' => '0', 'appearance' => '2', 'status' => '2', 'desc' => 'Also know as just Commander, determines all large-scale strategies as well as directs, deploys, and oversees all units from her station at the Bunker outpost in Earths orbit.', 'assigned_operator' => '1']
        ];

        foreach ($androids as $android) {
            Android::create($android);
        }

    }
}
