<?php

namespace App\Http\Controllers\Complain;

use App\Http\Controllers\Controller;
use App\Http\Requests\Complain\StoreComplainRequest;
use App\Models\Category;
use App\Models\Complain;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complains = Complain::with(['user', 'category'])->get();
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

        Complain::create($data);


        return redirect()->route('complain.index')->with('success', 'Keluhan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complain $complain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complain $complain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complain $complain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complain $complain)
    {
        //
    }
}
