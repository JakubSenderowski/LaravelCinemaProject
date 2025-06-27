<?php

namespace App\Http\Controllers;
use App\Models\Film;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $filmy = Film::with(['kategoria', 'tags'])
        ->where('is_active', true)
            ->get();

        $filmyPoliczone = Film::where('is_active', true)->count();

        $hotMovies = Film::with('kategoria')
            ->where('is_active', true)
            ->where('is_hot', true)
            ->limit(3)
            ->get();

        return view('film.index', compact('filmy', 'filmyPoliczone', 'hotMovies'));
    }
}
