@extends('layouts.plantillabase')

@section('contenido')
<h1>Item</h1>
<h2>CREAR REGISTROS</h2>

<form action="/item" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" value="{{ old('nombre') }}"></input>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" min="0" class="form-control" value="0.00">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Imagen</label>
        <input id="imagen" name="imagen" type="file" class="form-control" value="{{ old('imagen') }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Etiqueta</label>
        <br>
        <select class="form-select form-select-lg mb-3" id="tipo_id" name ="tipo_id">
        @foreach($tipos as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->etiqueta}}</option>
        @endforeach
        </select>
    </div>
    <a href="/item" class="btn btn-danger">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@endsection()