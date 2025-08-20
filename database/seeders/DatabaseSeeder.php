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
                'name' => 'user 1',
                'email' => 'user@gmail.com',
                'role' => 'resident',
                'password' => bcrypt('resident123'),
            ],
            [
                'name' => 'user 2',
                'email' => 'user2@gmail.com',
                'role' => 'resident',
                'password' => bcrypt('resident123'),
            ],
            [
                'name' => 'Staff Listrik',
                'email' => 'stafflistrik@gmail.com',
                'role' => 'staff',
                'password' => bcrypt('listrik123'),
                'specialization' => 'Listrik',
            ],
            [
                'name' => 'Staff Keamanan',
                'email' => 'staffkeamanan@gmail.com',
                'role' => 'staff',
                'password' => bcrypt('resident123'),
                'specialization' => 'Keamanan',
            ],
            [
                'name' => 'Staff Kebersihan',
                'email' => 'staffkebersihan@gmail.com',
                'role' => 'staff',
                'password' => bcrypt('resident123'),
                'specialization' => 'Kebersihan',
            ],
            [
                'name' => 'Staff Plumbing',
                'email' => 'staffplumbing@gmail.com',
                'role' => 'staff',
                'password' => bcrypt('resident123'),
                'specialization' => 'Plumbing',
            ],
        ]);

        $this->call([
            CategorySeeder::class,
            ComplainSeeder::class,
            AssignmenSeeder::class,
        ]);
    }
}
