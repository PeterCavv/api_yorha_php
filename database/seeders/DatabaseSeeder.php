<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('adminuhuy'),
        ]);
        $userAuthor = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('useruhuy'),
        ]);

        $userAdmin->assignRole($adminRole);
        $userAuthor->assignRole($userRole);
    }
}
