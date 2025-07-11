<?php

namespace App\Http\Controllers;
use App\Models\Film;
use App\Models\Tag;
use App\Models\Kategoria;
use Illuminate\Http\Request;

class AdminFilmController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filmy = Film::all();
        return view('admin.filmy.index', compact('filmy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategorie = Kategoria::all();
        $tags = Tag::where('is_active', true)->get();
        return view('admin.filmy.create', compact('kategorie', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tytul' => ['required', 'min:5'],
            'opis' => ['required', 'min:10'],
            'czas_trwania' => ['required', 'integer', 'min:60'],
            'poster' => ['required'],
            'is_hot' => ['boolean'],
            'is_active' => ['required', 'boolean'],
            'kategoria_id' => ['required', 'exists:kategorias,id'],
        ]);


        $film = Film::create($validated);

        // Tutaj przypięcie taga jeśli zaznaczono taga.
        if ($request->has('tags')) {
            $film->tags()->sync($request->input('tags'));
        }

        return redirect()->route('admin.filmy.index')->with("success", "Film został dodany pomyślnie :)!");
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
        $film = Film::with('kategoria')->findOrFail($id);
        $kategoria = Kategoria::all();
        $tags = Tag::where('is_active', true)->get();
        return view('admin.filmy.editView', compact('film', 'kategoria', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

        $validated = $request->validate([
            'tytul' => ['required', 'min: 5'],
            'opis' => ['required', 'min: 10'],
            'czas_trwania' => ['required', 'integer', 'min: 1'],
            'poster' => ['required'],
            'is_hot' => ['required', 'boolean'],
            'is_active' => ['required', 'boolean'],
            'kategoria_id' => ['required', 'exists:kategorias,id'],
        ]);

        $film = Film::findOrFail($id);
        $film->update($validated);
        if ($request->has('tags')) {
            $film->tags()->sync($request->input('tags'));
        } else {
            $film->tags()->sync([]); // Usunie jak nic nie jest zaznaczone
        }
        return redirect()->route('admin.filmy.index')->with('success', 'Film został zaktualizowany. :)');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $film = Film::findOrFail($id);
        $film->is_active = false;
        $film->save();

        return redirect('/filmy-zarzadzanie')->with('success', 'Film został usunięty. :)');
    }
    public function search(Request $request)
    {
        $query = $request->input('q');

        $filmy = Film::with(['kategoria', 'tags'])
            ->when($query, fn($q) => $q->where(fn($q2) =>
            $q2->where('tytul', 'like', "%{$query}%")
                ->orWhere('opis', 'like', "%{$query}%")
            ))
            ->get();

        return view('admin.filmy.index', compact('filmy', 'query'));
    }

}
