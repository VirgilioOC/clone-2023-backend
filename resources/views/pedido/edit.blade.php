@extends('layouts.plantillabase')

@section('contenido')
<h1>Pedido</h1>
<h2>EDITAR PEDIDOS</h2>

<form action="/pedido/{{$pedido->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">DNI Cliente</label>
        <input id="cliente_DNI" name="cliente_DNI" type="number" class="form-control" value="{{$pedido->cliente->DNI}}" readonly></input>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Importe</label>
        <input id="importe" name="importe" type="number" class="form-control" value="{{$pedido->importe}}" readonly>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Direccion</label>
        <input id="direccion" name="direccion" type="text" class="form-control" value="{{$pedido->direccion}}" readonly>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Direccion Altura</label>
        <input id="direccion_altura" name="direccion_altura" type="number" class="form-control" value="{{$pedido->direccion_altura}}" readonly>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Estado</label>
        <br>
        <select class="form-select form-select-lg mb-3" id="estado" name ="estado">
                <option @php if ($pedido->estado == 'pendiente')  {echo "selected";} @endphp>pendiente</option>
                <option @php if ($pedido->estado == 'en preparacion')  {echo "selected";} @endphp>en preparacion</option>
                <option @php if ($pedido->estado == 'en camino')  {echo "selected";} @endphp>en camino</option>
                <option @php if ($pedido->estado == 'entregado')  {echo "selected";} @endphp>entregado</option>
                <option @php if ($pedido->estado == 'cancelado')  {echo "selected";} @endphp>cancelado</option>
        </select>
    </div> 

    
    <a href="/pedido" class="btn btn-danger">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection()