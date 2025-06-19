<?php

namespace App\Http\Controllers;

use App\Models\Rezerwacje;
use App\Models\Seanse;
use Illuminate\Http\Request;

class RezerwacjeController extends Controller
{
    public function create()
    {
        $rezerwacje = Rezerwacje::with('seans', 'user')->get();
        return view('rezerwacje.create', compact('rezerwacje'));
    }
}
