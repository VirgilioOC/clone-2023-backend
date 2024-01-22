@extends('layouts.plantillabase')

@section('contenido')
<h1>Pedido</h1>
<h2>DETALLE DE UN PEDIDO</h2>
<a href="/pedido" class="btn btn-secondary">VOLVER A PEDIDOS</a>

<table class="table table-striped shadow-lg mt-4">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Item</th>
            <th scope="col">Etiqueta Item</th>
            <th scope="col">Tamaño</th>
            <th scope="col">Monto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedido->detalleItems as $detalle)
            <tr>
                <td>{{$detalle->id}}</td>
                <td>{{$detalle->item->nombre}}</td>
                <td>{{$detalle->item->tipo->etiqueta}}</td>
                <td>{{$detalle->tamaño}}</td>
                <td>{{$detalle->multiplicador_tamaño * $detalle->item->precio}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection()