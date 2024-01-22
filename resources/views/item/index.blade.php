@extends('layouts.plantillabase')

@section('contenido')
<h1>Item</h1>
@if ($user->rol == 'admin')
    <a href="item/create" class="btn btn-primary">CREAR</a>
@endif
<a href="/" class="btn btn-secondary">BACK TO MENU</a>

@php
    $items = $items->sortBy('id');
@endphp

<table class="table table-striped shadow-lg mt-4">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Etiqueta</th>
            <th scope="col">Precio</th>
            <th scope="col">Activo</th>
            <th scope="col">Path Imagen</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->tipo->etiqueta}}</td>
                    <td>{{$item->precio}}</td>
                    <td>
                        @if ($item->activo == 1)
                            Si
                        @else
                            No
                        @endif
                    </td>
                    <td>{{$item->path_imagen}}</td>
                    <td>
                        <a href="/item/{{$item->id}}/edit" class="btn btn-info">Cambiar Precio</a>
                        
                        @if ($item->activo == 1)
                            <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#confirmationModal{{$item->id}}" @php if ($user->rol != 'admin')  {echo "disabled";} @endphp>
                                Desactivar
                            </button>
                            <div class="modal fade" id="confirmationModal{{$item->id}}" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmationModalLabel">Confirmación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label>Si desactivas un item no podrá ser seleccionado para futuros pedidos.</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                            <form method="POST" action="/item/{{$item->id}}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Desactivar Item</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <form method="POST" action="/item/{{$item->id}}">
                                @csrf
                                <button type="submit" class="btn btn-success mt-2" @php if ($user->rol != 'admin')  {echo "disabled";} @endphp>Activar</button>
                            </form>
                        @endif
                    </td>
                </tr>
        @endforeach
    </tbody>
</table>

@endsection()