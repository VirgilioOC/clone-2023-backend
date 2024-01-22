<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use Illuminate\Support\Facades\Auth;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipo.index')->with('tipos', $tipos)->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tipo.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'etiqueta' => 'required|string|max:50',
        ]);

        if($validated){
            $tipos = new Tipo();
            $tipos->etiqueta = $request->get('etiqueta');
            $tipos->activo = 1;
        
        $tipos->save();
        }

        return redirect('/tipo');
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

    public function updateState(string $id){
        $tipo = Tipo::find($id);

        $tipo->activo = $tipo->activo == '1' ? 0 : 1;

        $tipo->save();

        return redirect('/tipo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
