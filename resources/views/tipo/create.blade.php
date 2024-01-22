@extends('layouts.plantillabase')

@section('contenido')
<h1>Tipo</h1>
<h2>CREAR REGISTROS</h2>

<form action="/tipo" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Etiqueta</label>
        <input id="etiqueta" name="etiqueta" type="text" class="form-control"></input>
    </div>
    <a href="/tipo" class="btn btn-danger">Cancelar</a>
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