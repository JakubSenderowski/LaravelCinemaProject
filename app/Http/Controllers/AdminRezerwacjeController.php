<?php

namespace App\Http\Controllers;

use App\Models\Rezerwacje;
use Illuminate\Http\Request;

class AdminRezerwacjeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rezerwacje = Rezerwacje::with('seans.film', 'user')->get();
        return view('admin.rezerwacje.index', compact('rezerwacje'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
