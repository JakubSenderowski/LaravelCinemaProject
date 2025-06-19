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
}
