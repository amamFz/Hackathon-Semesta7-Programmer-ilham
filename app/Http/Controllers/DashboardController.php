<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Complain;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Filter data sesuai role
        if ($user->role === 'resident') {
            // Hanya complain milik resident ini
            $complainQuery = Complain::where('user_id', $user->id);
        } elseif ($user->role === 'staff') {
            // Hanya complain yang pernah di-assign ke staff ini
            $complainQuery = Complain::whereHas('assignments', function ($q) use ($user) {
                $q->where('assigned_to', $user->id);
            });
        } else {
            // semuanya ambil
            $complainQuery = Complain::query();
        }

        // Grafik complain bulanan (12 bulan terakhir)
        $monthly = (clone $complainQuery)
            ->selectRaw(DB::raw(
                DB::getDriverName() === 'pgsql'
                    ? "to_char(created_at, 'YYYY-MM') as month, count(*) as total"
                    : "DATE_FORMAT(created_at, '%Y-%m') as month, count(*) as total"
            ))
            ->groupBy('month')
            ->orderBy('month')
            ->take(12)
            ->pluck('total', 'month');

        // Grafik complain per kategori
        $perCategory = (clone $complainQuery)
            ->select('category_id', DB::raw('count(*) as total'))
            ->groupBy('category_id')
            ->with('category')
            ->get()
            ->mapWithKeys(fn($row) => [$row->category->name ?? '-' => $row->total]);

        // Top 10 pelapor
        $topUsers = (clone $complainQuery)
            ->select('user_id', DB::raw('count(*) as total'))
            ->groupBy('user_id')
            ->with('user')
            ->orderByDesc('total')
            ->take(10)
            ->get()
            ->mapWithKeys(fn($row) => [$row->user->name ?? '-' => $row->total]);

        return view('dashboard', [
            'monthly' => $monthly,
            'perCategory' => $perCategory,
            'topUsers' => $topUsers,
        ]);
    }
}
