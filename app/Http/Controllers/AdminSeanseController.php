<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Film;
use App\Models\Seanse;
use Illuminate\Http\Request;

class AdminSeanseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seanse = Seanse::all();
        return view ('admin.seanse.index', compact('seanse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filmy = Film::where('is_active', true)->get();
        $sale = Sala::all();
        return view('admin.seanse.create', compact('filmy', 'sale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'film_id' => ['required', 'exists:films,id'],
            'sala_id' => ['required', 'exists:salas,id'],
            'data' => ['required', 'date'],
            'godzina' => ['required', 'date_format:H:i'],
            'cena' => ['required', 'numeric', 'min:0'],

        ]);


        Seanse::create($validated);

        return redirect()->route('admin.seanse.index')->with('success', 'Seans został dodany!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
