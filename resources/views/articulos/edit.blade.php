@extends('plantillas.plantilla')
@section('titulo')
Editar Articulos
@endsection
@section('cabecera')
Editar Articulo de {{$articulo->nombre}}
@endsection
@section('contenido')
@if($errors->any()){
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $miError) 
            <li>{{$miError}}</li>
            @endforeach
        </ul>
    </div>
}
@endif
<form name="editar" method="POST" action="{{route('articulos.update', $articulo)}}" enctype="multipart/form-data">
   @csrf
   @METHOD("put")
    <label >Nombre</label>
    <input type="text" name='nombre' class="form-control" value="{{$articulo->nombre}}">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Categoria</label>
        <select class="form-control" name="categoria">
        @if($articulo->categoria == "Bazar")
            <option selected>Bazar</option>
            <option>Hogar</option>
            <option>Electronica</option>
        @endif
        @if($articulo->categoria == "Hogar")
            <option >Bazar</option>
            <option selected>Hogar</option>
            <option>Electronica</option>
        @endif
        @if($articulo->categoria == "Electronica")
            <option >Bazar</option>
            <option >Hogar</option>
            <option selected>Electronica</option>
        @endif
        </select>
    </div>
    <label >Precio</label>
    <input type="text" name="precio" class="form-control" value="{{$articulo->precio}}">
    <label >Stock</label>
    <input type="text" name="stock" class="form-control" value="{{$articulo->stock}}">

    <div class="form-group">
        <label for="exampleFormControlFile1">Imagen</label>
        <input type="file" class="form-control-file" name="foto">
        <img src="{{asset($articulo->foto)}}" class="rounded-circle" width="90px" height="90px">
    </div>
    <input type="submit">
    <a href="{{route('articulos.index')}}">Volver</a>
</form>

@endsection