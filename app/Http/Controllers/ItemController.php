<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Models\Tipo;
use App\Models\DetalleItem;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('item.index')->with('items', $items)->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipo::all();
        return view("item.create")->with('tipos', $tipos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'precio' => 'required|numeric',
            'imagen' => 'required|image'
        ]);

        if($validated){
            $items = new Item();
            $items->nombre = $request->get('nombre');
            $items->tipo_id = $request->get('tipo_id');
            $items->precio = $request->get('precio');
            $items->activo = 1;

            $image = $request->file('imagen');
            $uploadedFile = $image->storeOnCloudinary('items');
            $items->path_imagen = $uploadedFile->getSecurePath();
        
            $items->save();

            $detalleItemChico = new DetalleItem();
            $detalleItemChico->id_item = $items->id;
            $detalleItemChico->tamaño = "chico";
            $detalleItemChico->multiplicador_tamaño = 0.8;

            $detalleItemChico->save();

            $detalleItemMediano = new DetalleItem();
            $detalleItemMediano->id_item = $items->id;
            $detalleItemMediano->tamaño = "mediano";
            $detalleItemMediano->multiplicador_tamaño = 1;

            $detalleItemMediano->save();

            $detalleItemGrande = new DetalleItem();
            $detalleItemGrande->id_item = $items->id;
            $detalleItemGrande->tamaño = "grande";
            $detalleItemGrande->multiplicador_tamaño = 1.5;

            $detalleItemGrande->save();

            return redirect('/item');
        }
        else
            return redirect()->back()->withInput();
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
        $item = Item::find($id);
        return view('item.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'precio' => 'required|numeric',
        ]);

        if($validated){
            $item = Item::find($id);
            $item->nombre = $item->nombre;
            $item->tipo_id = $item->tipo_id;
            $item->precio = $request->get('precio');
            $item->activo = $item->activo;
            $item->path_imagen = $item->path_imagen;

            $item->save();
        }

        return redirect('/item');
    }

    /**
     * Update the state of the specified resource in storage.
     */

    public function updateState(string $id){
        $item = Item::find($id);

        $item->activo = $item->activo == '1' ? 0 : 1;

        $item->save();

        return redirect('/item');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
