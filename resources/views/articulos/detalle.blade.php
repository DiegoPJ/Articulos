@extends('plantillas.plantilla')
@section('titulo')
    Detalle Articulo
@endsection
@section('cabecera')
    Detalles :   <b>{{($articulo->nombre)}}</b>

@endsection
@section('contenido')
    <span class="clearfix"></span>
    <div class="card text-white bg-info mt-5 mx-auto">
      
            <div class="float-right"><img src="{{asset($articulo->foto)}}" width="160px" heght="160px" class="rounded-circle"></div>
            <p><b>Nombre:</b> {{($articulo->nombre)}}</p>
            <p><b>Categoria:  - </b>{{($articulo->categoria)}}</p>
            <p><b>Precio (€):  -</b> {{($articulo->precio)}}</p>
            <p><b>stock   -  {{($articulo->stock)}}</p>
            </p>
            <a href="{{route('articulos.index')}}" class="float-right btn btn-success">Volver</a>
        </div>
    </div>



@endsection
