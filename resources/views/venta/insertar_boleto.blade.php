@extends('templates.content')

@section('content')

<div class="container">
    {{-- Sección de los Modales --}}
    <div class="modal-header">
        <h5 class="modal-title">GESTION DE BOLETOS</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>

    <h6 class="text-center">Selecciona los asientos a reservar</h6>

    <select class="form-control" name="" id="">
        @foreach($vagones as $vagon)
        <option value="{{$vagon->id}}">{{$vagon->descripcion}}</option>
        @endforeach
    </select>
    <div class="d-flex justify-content-center pb-2">
        <div class="bg-success p-2 m-2">Disponibles</div>
        <div class="bg-warning p-2 m-2">Fuera de servicio</div>
        <div class="bg-danger p-2 m-2">Reservados</div>
    </div>
    <form method="post" action="{{route('venta.completar_venta', $viaje->id)}}">
        @csrf
        <div class="row m-1">
            @foreach($asientos as $asiento)
            <div class="col-md-2">
                <div class="card border bg-success" style="height:50px">
                    <div class="d-flex justify-content-center" style="width:100%; height:60%">
                        <h4>{{$asiento->nro_asiento}}</h4>
                       
                    </div>
                    <div class="d-flex justify-content-center" style="width:100%; height:40%">
                        <input type="checkbox" name="asientos[]" value="{{$asiento->id_asiento}}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center m-3">
            <button type="submit" class="btn btn-primary">Agregar Asientos</button>
        </div>
    </form>
  
</div>
@stop
