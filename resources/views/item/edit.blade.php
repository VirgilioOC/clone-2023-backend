@extends('layouts.plantillabase')

@section('contenido')
<h1>Item</h1>
<h2>EDITAR REGISTROS</h2>

<form action="/item/{{$item->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" value="{{$item->nombre}}" readonly></input>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Etiqueta</label>
        <input id="tipo_id" name="tipo_id" type="text" class="form-control" value="{{$item->tipo->etiqueta}}"readonly>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" min="0" class="form-control" value="{{$item->precio}}">
    </div>
    <a href="/item" class="btn btn-danger">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection()