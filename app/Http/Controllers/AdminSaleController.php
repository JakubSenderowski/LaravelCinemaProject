<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Seanse;
use Illuminate\Http\Request;

class AdminSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sale = Sala::all();
        return view ('admin.sale.index', compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nazwa' => ['required', 'min:5'],
            'liczba_miejsc' => ['required', 'integer', 'min:50'],
            'is_active' => ['required', 'boolean'],
        ]);

        Sala::create($validated);

        return redirect()->route('admin.sale.index')->with("success", "Sala została dodana pomyślnie :)!");
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
        $sale = Sala::findOrFail($id);
        return view('admin.sale.editView', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nazwa' => ['required', 'min:5'],
            'liczba_miejsc' => ['required', 'integer', 'min:50'],
            'is_active' => ['required', 'boolean'],
        ]);
        $sale = Sala::findOrFail($id);
        $sale->update($validated);
        return redirect()->route('admin.sale.index')->with('success', 'Sala została zaktualizowana. :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sale = Sala::findOrFail($id);
        $sale->is_active = false;
        $sale->save();
        return redirect('/sale-zarzadzanie')->with('success', 'Sala została usunięta. :)');
    }
}
