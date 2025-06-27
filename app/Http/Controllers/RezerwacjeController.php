<?php

namespace App\Http\Controllers;

use App\Models\Rezerwacje;
use App\Models\Seanse;
use Illuminate\Http\Request;

class RezerwacjeController extends Controller
{

    public function show()
    {
        $seanse = Seanse::where('is_active', true)
            ->with('film')
            ->get();

        return view('rezerwacje.show', compact('seanse'));
    }

    public function showRezerwacje()
    {
        $rezerwacje = Rezerwacje::with('seans.film')
            ->where('user_id', auth()->id())
            ->where('is_active', true)
            ->get();

        return view('rezerwacje.show-rezerwacje', compact('rezerwacje'));
    }

    public function create($seanses_id)
    {
        $seans = Seanse::with('film')->findOrFail($seanses_id);
        return view('rezerwacje.create', compact('seans'));

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'seans_id' => ['required', 'exists:seanses,id'],
            'liczba_miejsc' => ['required', 'integer', 'min:1'],
        ]);

        Rezerwacje::create([
            'user_id' => auth()->id(),
            'seans_id' => $validated['seans_id'],
            'liczba_miejsc' => $validated['liczba_miejsc'],
        ]);

        return redirect('/rezerwacja-dokonana')
            ->with('success', 'Rezerwacja została zapisana – edytuj lub anuluj ją w sekcji "Moje Rezerwacje" w Menu Głównym!');
    }

    public function editView(int $id)
    {
        $rezerwacja = Rezerwacje::with('seans.film')->findOrFail($id);
        $seanse = Seanse::with('film')
            ->where('is_active', true)
            ->get();
        return view('rezerwacje.editView', compact('rezerwacja', 'seanse'));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'seans_id' => ['required', 'exists:seanses,id'],
            'liczba_miejsc' => ['required', 'integer', 'min:1'],
        ]);

        $rezerwacja = Rezerwacje::findOrFail($id);

        $rezerwacja->update([
            'seans_id' => $validated['seans_id'],
            'liczba_miejsc' => $validated['liczba_miejsc'],
        ]);

        return redirect('/rezerwacja-dokonana')
            ->with('success', 'Rezerwacja została zaktualizowana!');
    }

    public function delete(int $id)
    {
        $rezerwacja = Rezerwacje::findOrFail($id);
        $rezerwacja->is_active = false;
        $rezerwacja->save();

        return redirect('/rezerwacja-dokonana');
    }
}
