<?php

namespace App\Http\Controllers;

use App\Models\Rezerwacje;
use App\Models\Seanse;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRezerwacjeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rezerwacje = Rezerwacje::with('seans.film', 'user')->get();
        return view('admin.rezerwacje.index', compact('rezerwacje'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $uzytkownicy = User::all();
        $seanse = Seanse::with('film')->get();

        return view('admin.rezerwacje.create', compact('uzytkownicy', 'seanse'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'seans_id' => ['required', 'exists:seanses,id'],
            'liczba_miejsc' => ['required', 'integer', 'min:1'],
            'is_active' => ['required', 'boolean'],
        ]);

        Rezerwacje::create($validated);

        return redirect()->route('admin.rezerwacje.index')->with('success', 'Rezerwacja została dodana pomyślnie. :)');
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
        $rezerwacje = Rezerwacje::with('seans.film', 'user')->findOrFail($id);
        $users = User::all();
        $seanse = Seanse::with('film')->get();
        return view('admin.rezerwacje.editView', compact('rezerwacje', 'users', 'seanse'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'seans_id' => ['required', 'exists:seanses,id'],
            'liczba_miejsc' => ['required', 'integer', 'min:1'],
            'is_active' => ['required', 'in:0,1'],


        ]);

        $rezerwacja = Rezerwacje::findOrFail($id);
        $rezerwacja->update($validated);
        return redirect()->route('admin.rezerwacje.index')->with('success', 'Rezerwacja została zaktualizowana. :)');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $rezerwacja = Rezerwacje::findOrFail($id);
        $rezerwacja->is_active = false;
        $rezerwacja->save();
        return redirect('/rezerwacje-zarzadzanie')->with('success', 'Rezerwacja została usunięta. :)');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $rezerwacje = Rezerwacje::with(['user', 'seans.film'])
            ->when($query, fn($q) => $q->whereHas('user', fn($u) =>
            $u->where('name', 'like', "%{$query}%")
            ))
            ->get();

        return view('admin.rezerwacje.index', compact('rezerwacje', 'query'));
    }

}
