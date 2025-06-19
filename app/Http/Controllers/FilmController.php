<?php

namespace App\Http\Controllers;
use App\Models\Film;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $filmy = Film::all();
        $filmyPoliczone = Film::count();
        $hotMovies = Film::with('kategoria')
           ->where('is_hot', true)
            ->limit(3)
           ->get();
        return view ('film.index', compact('filmy', 'filmyPoliczone', 'hotMovies'));
    }
}
