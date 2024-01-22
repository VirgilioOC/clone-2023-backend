<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedido.index')->with('pedidos', $pedidos);
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
        $pedido = Pedido::find($id);
        return view('pedido.edit')->with('pedido', $pedido);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pedido = Pedido::find($id);

        $pedido->cliente_id = $pedido->cliente_id;
        $pedido->importe = $request->get('importe');
        $pedido->direccion = $request->get('direccion');
        $pedido->direccion_altura = $request->get('direccion_altura');
        $pedido->estado = $request->get('estado');

        $pedido->save();

        return redirect('/pedido');
    }

    /**
     * Show detail for a specified pedido.
     */
    public function detalle(string $id){
        $pedido = Pedido::find($id);
        return view('pedido.detalle')->with('pedido', $pedido); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
