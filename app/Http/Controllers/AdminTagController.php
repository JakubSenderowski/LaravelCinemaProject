<?php
namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nazwa' => 'required|string|max:100|unique:tags,nazwa',
        ]);

        Tag::create([
            'nazwa' => $validated['nazwa'],
            'is_active' => true,
        ]);

        return redirect()->route('admin.tags.index')->with('success', 'Tag został dodany.');
    }

    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.editView', compact('tag'));
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nazwa' => ['required', 'min:3', 'max:100', 'unique:tags,nazwa,' . $id],
            'is_active' => ['required', 'boolean'],
        ]);

        $tag = Tag::findOrFail($id);
        $tag->update($validated);

        return redirect()->route('admin.tags.index')->with('success', 'Tag został zaktualizowany. ✅');
    }


    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->is_active = false;
        $tag->save();

        return redirect()->route('admin.tags.index')->with('success', 'Tag został dezaktywowany. :)');
    }
    public function search(Request $request)
    {
        $query = $request->input('q');

        $tags = Tag::when($query, fn($q) =>
        $q->where('nazwa', 'like', "%{$query}%")
        )->get();

        return view('admin.tags.index', compact('tags', 'query'));
    }


}
