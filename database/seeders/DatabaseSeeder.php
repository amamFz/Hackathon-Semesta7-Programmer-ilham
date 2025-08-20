<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->createMany([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('admin123'),
            ],
            [
                'name' => 'Supervisor',
                'email' => 'supervisor@gmail.com',
                'role' => 'supervisor',
                'password' => bcrypt('supervisor123'),
            ],
            [
                'name' => 'Resident',
                'email' => 'resident@gmail.com',
                'role' => 'resident',
                'password' => bcrypt('resident123'),
            ],
        ]);
    }
}
