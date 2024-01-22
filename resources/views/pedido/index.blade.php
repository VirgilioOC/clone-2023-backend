@extends('layouts.plantillabase')

@section('contenido')
<h1>Pedido</h1>
<a href="/" class="btn btn-secondary">BACK TO MENU</a>

@php
    $pedidos = $pedidos->sortBy('id');
@endphp

<table class="table table-striped shadow-lg mt-4">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">DNI Cliente</th>
            <th scope="col">Importe</th>
            <th scope="col">Direccion</th>
            <th scope="col">Altura</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedidos as $pedido)
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->cliente->DNI}}</td>
                <td>{{$pedido->importe}}</td>
                <td>{{$pedido->direccion}}</td>
                <td>{{$pedido->direccion_altura}}</td>
                <td>{{$pedido->estado}}</td>
                <td>
                    <form method="GET" action="/pedido/{{$pedido->id}}/edit">
                        @csrf
                        <button type="submit" class="btn btn-info mb-2" @php if ($pedido->estado == 'cancelado' || $pedido->estado == 'entregado')  {echo "disabled";} @endphp>Cambiar Estado</button>
                    </form>
                    <a href="/pedido/{{$pedido->id}}/detalle" class="btn btn-info">Mostrar Detalle</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection()