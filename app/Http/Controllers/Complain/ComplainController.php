<?php

namespace App\Http\Controllers\Complain;

use App\Http\Controllers\Controller;
use App\Http\Requests\Complain\StoreComplainRequest;
use App\Http\Requests\Complain\UpdateComplainRequest;
use App\Models\Assignment;
use App\Models\Category;
use App\Models\Complain;
use App\Models\User;
use App\Notifications\AssignmentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'resident') {
            // Hanya keluhan milik user sendiri
            $complains = Complain::with(['user', 'category'])
                ->where('user_id', $user->id)
                ->paginate(10);
        } elseif ($user->role === 'staff') {
            // Hanya keluhan yang pernah di-assign ke staff ini
            $complains = Complain::with(['user', 'category'])
                ->whereHas('assignments', function ($q) use ($user) {
                    $q->where('assigned_to', $user->id);
                })
                ->paginate(10);
        } else {
            // admin/supervisor: semua keluhan
            $complains = Complain::with(['user', 'category'])
                ->paginate(10);
        }

        return view('pages.complain.index', compact('complains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.complain.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComplainRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('complains', 'public');
        }

        $data['user_id'] = auth()->id();
        $data['category_id'] = Category::autoAssignIdFromTitle($data['title']);

        $complain = Complain::create($data);

        $staffs = User::where('role', 'staff')
            ->where('specialization', $complain->category->name)
            ->get();

        foreach ($staffs as $staff) {
            Assignment::create([
                'complain_id' => $complain->id,
                'assigned_to' => $staff->id,
                'assigned_by' => auth()->id(),
                'assigned_at' => now(),
                'note' => 'Auto-assign by system',
            ]);

            if (!empty($staff->telegram_chat_id)) {
                $staff->notify(new AssignmentNotification($complain, 'new'));
            }
        }

        return redirect()->route('complain.index')->with('success', 'Keluhan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complain $complain)
    {
        $complain->load(['user', 'category', 'assignments.assignedTo']);
        return view('pages.complain.show', compact('complain'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complain $complain)
    {
        $complain->load(['user', 'category']);
        return view('pages.complain.edit', compact('complain'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplainRequest $request, Complain $complain)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($complain->photo) {
                Storage::disk('public')->delete($complain->photo);
            }
            $data['photo'] = $request->file('photo')->store('complains', 'public');
        }

        $data['category_id'] = Category::autoAssignIdFromTitle($data['title']);
        $data['comment'] = $request->comment ?? $complain->comment;

        if ($request->filled('comment')) {
            $data['status'] = 'closed';
        }

        $complain->update($data);

        return redirect()->route('complain.index')->with('success', 'Keluhan berhasil diperbarui.');
    }

    public function prosess(Complain $complain)
    {
        $complain->update(['status' => 'in_progress']);

        foreach ($complain->assignments as $assignment) {
            $user = $assignment->assignedTo;
            if ($user && !empty($user->telegram_chat_id)) {
                $user->notify(new AssignmentNotification($complain, 'in_progress'));
            }
        }

        return redirect()->route('complain.index')->with('success', 'Keluhan sedang diproses.');
    }

    public function close(Complain $complain)
    {

        $complain->update(['status' => 'closed', 'comment' => 'Keluhan ditutup oleh admin.']);

        foreach ($complain->assignments as $assignment) {
            $user = $assignment->assignedTo;
            if ($user && !empty($user->telegram_chat_id)) {
                $user->notify(new AssignmentNotification($complain, 'closed'));
            }
        }
        return redirect()->route('complain.index')->with('success', 'Keluhan berhasil ditutup.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complain $complain)
    {

        if ($complain->photo) {
            Storage::disk('public')->delete($complain->photo);
        }

        $complain->delete();
        return redirect()->route('complain.index')->with('success', 'Keluhan berhasil dihapus.');
    }
}
