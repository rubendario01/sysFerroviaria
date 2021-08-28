@extends('templates.content')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="alert-dismiss">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Ruta creada con éxito!</strong> Eliga una accion.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Información de la ruta
        </div>
        <div class="card-body">
            <b>Nombre Ruta: </b><p>{{ $ruta_informacion->nombre }}</p>
            <b>Longitud: </b><p>{{ $ruta_informacion->longitud}}</p>
        </div>
    </div>
    <div class="container d-flex justify-content-center">
        <a href="{{route('ruta.insertar')}}" class="btn btn-success m-2">
            <span class="ti-angle-left"></span> Volver a Insertar
        </a>

        <a href="{{route('ruta.index')}}" class="btn btn-danger m-2">
            <span class="ti-angle-up"></span> Ir a Rutas
        </a>
        <a href="{{route('ruta.insertar-tramos', $ruta_informacion->id)}}" class="btn btn-primary m-2">
            <span class="ti-angle-right"></span> Agregar Tramos
        </a>
    </div>
    
</div>
@stop 