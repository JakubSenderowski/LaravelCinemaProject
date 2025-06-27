<?php

namespace App\Http\Controllers;
use App\Models\Film;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->input('q');

        $filmy = Film::with(['kategoria', 'tags'])
            ->where('is_active', true)
            ->when($query, function($q) use ($query) {
                $q->where(function($q2) use ($query) {
                    $q2->where('tytul', 'like', '%' . $query . '%')
                        ->orWhere('opis', 'like', '%' . $query . '%');
                });
            })
            ->get();

        return view('results', compact('filmy', 'query'));
    }
}
