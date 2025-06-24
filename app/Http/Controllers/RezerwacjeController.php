<?php

namespace App\Http\Controllers;

use App\Models\Rezerwacje;
use App\Models\Seanse;
use Illuminate\Http\Request;

class RezerwacjeController extends Controller
{

    public function show()
    {
        $rezerwacje = Rezerwacje::with('seans', 'user')->get();
        return view('rezerwacje.show', compact('rezerwacje'));
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
        $rezerwacja = Rezerwacje::with('seans', 'user')->findOrFail($seanses_id);
        return view('rezerwacje.create', compact('rezerwacja'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'film_id' => ['required', 'exists:films,id'],
            'seans_id' => ['required', 'exists:seanses,id'],
            'sala_id' => ['required', 'exists:salas,id'],
            'data' => ['required', 'date'],
            'godzina' => ['required', 'date_format:H:i'],
            'liczba_miejsc' => ['required', 'integer', 'min:1'],
        ]);
        Rezerwacje::create([
            'user_id' => auth()->id(),
            'seans_id' => $validated['seans_id'],
            'liczba_miejsc' => $validated['liczba_miejsc'],
        ]);

        return redirect('/')->with('success', 'Rezerwacja została zapisana - Popełniłeś błąd edytuj lub anuluj rezerwację w sekcji "Moje Rezerwacje" w Menu Głównym.!');
    }
    public function editView(int $id)
    {
        $rezerwacja = Rezerwacje::with('seans.film')->findOrFail($id);
        $seanse = Seanse::with('film')->get();
        return view('rezerwacje.editView', compact('rezerwacja', 'seanse'));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'film_id' => ['required', 'exists:films,id'],
            'data' => ['required', 'date'],
            'godzina' => ['required', 'date_format:H:i'],
            'liczba_miejsc' => ['required', 'integer', 'min:1'],
        ]);

        $rezerwacja = Rezerwacje::findOrFail($id);
        $seans = Seanse::where('film_id', $validated['film_id'])
            ->where('data', $validated['data'])
            ->where('godzina', $validated['godzina'])
            ->first();

        if (!$seans) {
            return back()->withErrors([
                'data' => 'Brak seansu z tym filmem, datą i godziną.'
            ])->withInput();

        }

        $rezerwacja->update([
            'seans_id' => $seans->id,
            'liczba_miejsc' => $validated['liczba_miejsc'],
        ]);

        return redirect('/rezerwacja-dokonana');
    }
    public function delete(int $id)
    {
        $rezerwacja = Rezerwacje::findOrFail($id);
        $rezerwacja->is_active = false;
        $rezerwacja->save();

        return redirect('/rezerwacja-dokonana');
    }
}
