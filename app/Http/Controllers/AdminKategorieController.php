<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use Illuminate\Http\Request;

class AdminKategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategorie = Kategoria::all();
        return view('admin.kategorie.index', compact('kategorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategorie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'nazwa' => ['required', 'min:5'],
           'is_active' => ['required', 'boolean'],
        ]);

        Kategoria::create($validated);
        return redirect()->route('admin.kategorie.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategorie = Kategoria::findOrFail($id);
        return view('admin.kategorie.editView', compact('kategorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nazwa' => ['required', 'min:5'],
            'is_active' => ['required', 'boolean'],
        ]);

        $kategorie = Kategoria::findOrFail($id);
        $kategorie->update($validated);
        return redirect()->route('admin.kategorie.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategorie = Kategoria::findOrFail($id);
        $kategorie->is_active = false;
        $kategorie->save();
        return redirect('/kategorie-zarzadzanie');
    }
}
