<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resident = User::where('role', 'resident')->first();

        $plumbing = Category::where('name', 'Plumbing')->first();
        $listrik = Category::where('name', 'Listrik')->first();
        $kebersihan = Category::where('name', 'Kebersihan')->first();
        $keamanan = Category::where('name', 'Keamanan')->first();

        $complains = [
            [
                'user_id' => $resident->id,
                'category_id' => $plumbing->id,
                'title' => 'Kebocoran Pipa Toilet',
                'description' => 'Ada kebocoran pipa di toilet yang perlu segera diperbaiki unit A-101.',
                'photo' => 'https://example.com/toilet.jpg',
                'status' => 'open',
            ],
            [
                'user_id' => $resident->id,
                'category_id' => $listrik->id,
                'title' => 'Lampu Mati',
                'description' => 'Lampu lorong lantai 2 mati.',
                'photo' => 'https://example.com/lampu.jpg',
                'status' => 'open',
            ],
            [
                'user_id' => $resident->id,
                'category_id' => $kebersihan->id,
                'title' => 'Sampah Menumpuk',
                'description' => 'Sampah di area parkir menumpuk dan perlu dibersihkan.',
                'photo' => 'https://example.com/sampah.jpg',
                'status' => 'open',
            ],
            [
                'user_id' => $resident->id,
                'category_id' => $keamanan->id,
                'title' => 'Keamanan',
                'description' => 'Ada orang mencurigakan di sekitar area parkir pada malam hari.',
                'photo' => 'https://example.com/security.jpg',
                'status' => 'open',
            ],
        ];

        foreach ($complains as $complain) {
            $resident->complains()->create($complain);
        }
    }
}
