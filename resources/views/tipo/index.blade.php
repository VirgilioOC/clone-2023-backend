@extends('layouts.plantillabase')

@section('contenido')
<h1>Tipo</h1>
@if ($user->rol == 'admin')
    <a href="tipo/create" class="btn btn-primary">CREAR</a>
@endif
<a href="/" class="btn btn-secondary">BACK TO MENU</a>

@php
    $tipos = $tipos->sortBy('id');
@endphp

<table class="table table-striped shadow-lg mt-4">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Etiqueta</th>
            <th scope="col">Activo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tipos as $tipo)
            <tr>
                <td>{{$tipo->id}}</td>
                <td>{{$tipo->etiqueta}}</td>
                <td>
                    @if ($tipo->activo == 1)
                        Si
                    @else
                        No
                    @endif
                </td>
                <td>
                    @if ($tipo->activo == 1)
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationModal{{$tipo->id}}" @php if ($user->rol != 'admin')  {echo "disabled";} @endphp>
                            Desactivar
                        </button>
                        <div class="modal fade" id="confirmationModal{{$tipo->id}}" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmationModalLabel">Confirmación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label>Si estas desactivando un tipo, los items asociados activados no se podrán seleccionar.</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                        <form method="POST" action="{{ route('tipo.update', ['id' => $tipo->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Desactivar Tipo</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <form method="POST" action="{{ route('tipo.update', ['id' => $tipo->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-success" @php if ($user->rol != 'admin')  {echo "disabled";} @endphp>Activar</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection()