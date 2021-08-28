@extends('templates.content')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="header-title">REGISTRO DE LOS TRAMOS DE LA RUTA ACTUAL</h4>
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="form-group text-center">
                    <label for="" class="text-center">Rutal actual</label>
                    <input type="text" class="form-control" value="{{$rut->nombre}}" disabled>
                </div>
            </div>
        </div>

        {{-- <div class="row justify-content-center">
            <div class="col-10">
                    <div class="input-group mb-3">

                        <input type="text" class="form-control" placeholder="Ingresa el tramos a buscar">

                        <select name="" id="" class="form-control">
                            <option value="">Todo</option>
                        </select>

                        <div class="input-group-append">
                            <a id="btnBuscarTramo" class="btn btn-primary" href=""><span class="ti-search"></span>
                                Buscar tramo</a>
                        </div>
                    </div>
            
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-12 text-center">
                <button id="btnBuscarTramos" class="btn btn-primary">Agregar tramos</button>
            </div>
        </div>


        <form method="post" action="{{route('ruta.store-tramos', $rut->id)}}">
            @csrf

            <div class="single-table mt-3">
                <div class="table-responsive">
                <table class="table text-center">
                    <thead class="text-uppercase">
                        <tr>
                            <th><input type="checkbox" name="" id="check-eliminar-todo"></th>
                            <th scope="col">Tramo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyTramos">
                        <tr>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">
                        Registrar tramos
                    </button>
                </div>
            </div>
        </form>
        </div>
        

    </div>
</div>

{{-- Sección de los Modales --}}
<div class="modal fade bd-example-modal-lg" id="modalBuscarTramos">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tramos Disponibles</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th><input type="checkbox" name="" id="check-eliminar-todo"></th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Longitud</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tramos as $tramo)
                                <tr idTramo="{{$tramo->id}}" nombreTramo="{{$tramo->nombre}}">
                                    <th><input type="checkbox" name="" id=""></th>
                                    <th scope="row">{{$tramo->id}}</th>
                                    <td>{{$tramo->nombre}}</td>
                                    <td>{{$tramo->longitud}}</td>
                                    <td>
                                        <a href="" class="btn btn-info btn-xs btnSeleccionar">
                                            <i class="ti-hand-point-up"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$tramos->links()}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

@stop

@section('js')
<script>
    $('#btnBuscarTramos').on('click', function (e) {
        e.preventDefault();
        $('#modalBuscarTramos').modal('show');
    });

    $(document).on('click','.btnSeleccionar', function(e){
        e.preventDefault();
        let elemento=$(this)[0].parentElement.parentElement;
        let id=$(elemento).attr("idTramo");
        let nombre=$(elemento).attr("nombreTramo");
       
    
        $('#tbodyTramos').append(`<tr>
            <td><input type="checkbox" name="" id="check-eliminar-todo"></td>
            <td>${nombre}</td>
            <input type="hidden" name="tramo_id[]" value="${id}">
            <td>
                <a href="" class="btn btn-danger btn-xs">
                    <i class="ti-trash"></i>
                    </a>
                    </td>
                    </tr>)`);

        $('#modalBuscarTramos').modal('hide');
    });

</script>
@stop
