@extends('plantillas.plantilla')
@section('titulo')
Crear Articulos
@endsection
@section('cabecera')
Crear Articulos
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
<form name="creaArt" method="POST" action="{{route('articulos.store')}}" enctype="multipart/form-data">
   @csrf
   @METHOD("POST")
    <label >Nombre</label>
    <input type="text" name='nombre' class="form-control">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Categoria</label>
        <select class="form-control" name="categoria">
        <option>Bazar</option>
        <option>Hogar</option>
        <option>Electronica</option>
        </select>
    </div>
    <label >Precio</label>
    <input type="text" name="precio" class="form-control">
    <label >Stock</label>
    <input type="text" name="stock" class="form-control">


    <div class="form-group">
        <label for="exampleFormControlFile1">Imagen</label>
        <input type="file" class="form-control-file" name="foto">
    </div>
    <input type="submit">
    <a href="{{route('articulos.index')}}">Volver</a>
</form>

@endsection