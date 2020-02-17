@extends('plantillas.plantilla')
@section('title')
Articulos
@endsection
@section('cabecera')
Articulos
@endsection
@section('contenido')
<div class="container mt-2">
 <a href="{{route('articulos.create')}}">Crear Articulo</a>

 <form name="search" method="GET" action="{{route('articulos.index')}}" class="form-inline float-right">
 <label>Categoria</label>

      <select name="categoria" class="form-control mr-2 float-left">
    <option value='%'>Todos</option>
      @foreach($categorias as $ca)
      @if($ca == $request->categoria )
      <option selected>{{$ca}}</option>
      @else
      <option>{{$ca}}</option>
      @endif   
      @endforeach
  </select>
  <label>Precio</label>
  <select class="form-control mr-2 float-left" name="precio" >
      @if($request->precio == '%' )
        <option value='%' selected>Todos</option>
      @else 
       <option value='%'>Todos</option>
      @endif
      @if($request->precio == '1' )
        <option value="1" selected>Menor de 20€</option>
      @else
      <option value="1">Menor de 20€</option>
      @endif
      @if($request->precio == '2' )
      <option value="2" selected>De 20€ a 50€</option>
      @else
      <option value="2" >De 20€ a 50€</option>
      @endif
      @if($request->precio == '3' )
      <option value="3" selected>Mayor de 50€</option>
      @else
      <option value="3" >Mayor de 50€</option>
      @endif
  </select>
  
  <input type="submit" value="Buscar" class="btn btn-info ml-2">

</form>
 </div>
 

<table class="table">
  <thead>
    <tr>
      <th scope="col">Detalles</th>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
      <th scope="col">Imagen</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($articulos as $articulo)
    <tr>
      <th> <a href="{{route('articulos.show', $articulo)}}" class="btn btn-info">Detalles</a>
</th>
      <th scope="row">{{$articulo->id}}</th>
      <td>{{$articulo->nombre}}</td>
      <td>{{$articulo->categoria}}</td>
      <td>{{$articulo->precio}}</td>
      <td>{{$articulo->stock}}</td>
      <td><img src="{{asset($articulo->foto)}}" width="90px" height='90px' class="rounded-circle"></td>
      <td>

        

        <form name="borrar" method="POST" action="{{route('articulos.destroy', $articulo)}}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrarlo?')">
          Borrar</button>
          <a href='{{route('articulos.edit', $articulo)}}' class="btn btn-warning">Editar</a>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$articulos->appends(Request::except('page'))->links()}}


Tendremos la tabla con los siguientes campos, id, nombre, categoria (Bazar, Hogar, Elećtronica), precio, stock, imagen<br>
Haremos un Crud completo a esta tabla con Laravel, pondremos al menos busqueda por categoría y por rango de precio<br>
Subiremos el proyecto a Git y lo montaremos en una máquina virtual en Google Cloud<br>
Entregaremos el pdf con el paso a paso de la elaboración y la dirección en gitHub del proyecto. El viernes 14 enseñaremos el proyecto en la url de la máquina  virtual
@endsection