<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Complain;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();
        $supervisor = User::where('role', 'supervisor')->first();
        $staff = User::where('role', 'staff')->first();

        $complains = Complain::all();

        foreach ($complains as $index => $complain) {
            $assignedTo = $staff ?? $supervisor ?? $admin;
            $assignedBy = $admin ?? $supervisor;

            Assignment::create([
                'complain_id' => $complain->id,
                'assigned_to' => $assignedTo->id,
                'assigned_by' => $assignedBy->id,
                'assigned_at' => now()->addMinutes($index * 10),
                'note' => 'Penugasan otomatis oleh sistem.',
            ]);
        }
    }
}
