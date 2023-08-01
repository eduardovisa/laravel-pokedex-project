<?php

namespace App\Http\Controllers;

use App\Models\Pokemones;
use Illuminate\Http\Request;

class PokemonesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemones = Pokemones::all();
        return response()->json($pokemones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokedex.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosPokemon = request()->except('_token');
        Pokemones::insert($datosPokemon);

        return response()->json($datosPokemon);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemones $pokemones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemones $pokemones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemones $pokemones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemones $pokemones)
    {
        //
    }
}
