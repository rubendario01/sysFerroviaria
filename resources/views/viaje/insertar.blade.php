@extends('templates.content')

@section('content')

<!-- basic table start -->

{{-- <div class="card">
    <div class="row">
        <div class="col-md-9">
            <form>
                <div class="form-row align-items-center">
                    <div class="col-sm-3 my-1 p-4">
                        <label class="sr-only" for="inlineFormInputName">Name</label>
                        <input type="text" class="form-control" id="inlineFormInputName" placeholder="Jane Doe">
                    </div>
                    
                    <select class="form-control col-sm-3 my-1">
                        <option>Select</option>
                        <option>Large select</option>
                        <option>Small select</option>
                    </select>
        
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3 d-flex justify-content-end">
           
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Nuevo</button>
            </div>
        </div>
    </div>
</div> --}}



<div class="card">
    <div class="card-body">


        <h4 class="header-title">REGISTRAR NUEVO VIAJE</h4>
        <form action="{{route('viaje.store')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label for="example-date-input" class="col-form-label">Fecha</label>
                    <input name="fecha" class="form-control" type="date" id="example-date-input">
                </div>

                <div class="form-group col">
                    <label for="example-time-input" class="col-form-label">Horario</label>
                    <input name="horario" class="form-control" type="time" id="example-time-input">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="">Origen</label>
                    <input type="text" name="origen" id="" class="form-control">
                </div>
                <div class="form-group col">
                    <label for="">Destino</label>
                    <input type="text" name="destino" id="" class="form-control">
                </div>

            </div>



            <div class="form-row">
                <div class="form-group col">
                    <label for="">Seleccione un tren</label>
                    <div class="input-group mb-3">
                        <input id="txtBuscarTren" type="text" class="form-control" placeholder="Buscar un tren">
                        <input type="hidden" name="tren_id" id="tren_id">
                        <div class="input-group-append">
                            <a href="#" id="btnBuscarTren" class="btn btn-primary">Buscar</a>
                        </div>
                    </div>
                </div>

                <div class="form-group col">
                    <label for="">Seleccione una ruta</label>
                    <div class="input-group mb-3">
                        <input id="txtBuscarRuta" type="text" class="form-control" placeholder="Buscar una ruta">
                        <input type="hidden" name="ruta_id" id="ruta_id">
                        <div class="input-group-append">
                            <a href="#" id="btnBuscarRuta" class="btn btn-primary">Buscar</a>
                        </div>
                    </div>
                </div>

               
            </div>

            <div class="form-row">
                <div class="form-group col-6">
                    <label for="">Precio</label>
                    <div class="input-group mb-3">
                        <input name="precio" type="number" class="form-control" placeholder="">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Guardar</button>
            <a href="{{route('viaje.index')}}" class="btn btn-danger mt-4 pr-4 pl-4">Cancelar</a>
        </form>

            {{-- <div class="d-flex justify-content-center mt-2 mb-2">
                <a href="#" id="btnBuscarTramos" class="btn btn-success">Ver Tramos</a>
    </div> --}}



    {{-- <div class="row">
        <div class="col-md-12 text-center">
            <h6 class="m-2">Tramos de la ruta seleccionada</h6>
        </div>
    </div> --}}

    {{-- <div class="single-table">
        <div class="table-responsive">

            <table class="table text-center">
                <thead class="text-uppercase">
                    <tr>
                        <th><input type="checkbox" name="" id=""></th>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Longitud</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>

                <tbody id="tbodyTramos">
                    <tr >
                        <th><input type="checkbox" name="" id=""></th>
                        <th scope="row">1</th>
                        <td>tarija - abapo</td>
                        <td>1215544 km</td>
                        <td>
                            <a href="" class="btn btn-danger btn-xs">
                                <i class="ti-close"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div> --}}


    
    {{-- <div class="text-center">
        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Guardar</button>
        <a href="#" class="btn btn-danger mt-4 pr-4 pl-4">Cancelar</a>
    </div> --}}
    
</div>

</div>


{{-- Sección de los Modales --}}
<div class="modal fade bd-example-modal-lg" id="modalBuscarRuta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rutas Disponibles</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th><input type="checkbox" name="" id=""></th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Longitud</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rutas as $ruta)
                                <tr idRuta="{{$ruta->id}}" nombreRuta="{{$ruta->nombre}}" longitudRuta="{{$ruta->longitud}}">
                                    <th><input type="checkbox" name="" id=""></th>
                                    <th scope="row">{{$ruta->id}}</th>
                                    <td>{{$ruta->nombre}}</td>
                                    <td>{{$ruta->longitud}}</td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-xs ruta">
                                            <i class="ti-hand-point-up"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$rutas->links()}}
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="modalBuscarTren">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Trenes Disponibles</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th><input type="checkbox" name="" id=""></th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Capacidad</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trenes as $tren)
                                <tr idTren="{{$tren->id}}" codigoTren="{{$tren->codigo}}" nombreTren="{{$tren->nombre}}">
                                    <th><input type="checkbox" name="" id=""></th>
                                    <th scope="row">{{$tren->id}}</th>
                                    <td>{{$tren->codigo}}</td>
                                    <td>{{$tren->nombre}}</td>
                                    <td>{{$tren->descripcion}}</td>
                                    <td>{{$tren->modelo}}</td>
                                    <td>{{$tren->capacidad}}</td>
                                    <td>
                                        <a href="" class="btn btn-info btn-xs trenes">
                                            <i class="ti-hand-point-up"></i>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

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
                                <tr idTramo="{{$tramo->id}}" nombreTramo="{{$tramo->nombre}}" longitudTramo="{{$tramo->longitud}}">
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
    // $('#btnBuscarRuta').on('click', function (e) {
    //     e.preventDefault();
    //     $('#modalBuscarRuta').modal('show');
    // });

    $('#btnBuscarTren').on('click', function (e) {
        e.preventDefault();
        $('#modalBuscarTren').modal('show');

        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr("idTren");
        let nombre = $(elemento).attr("nombreTren");
        $('#txtBuscarTren').val(nombre);
        $('#tren_id').val(id);
    });

    $(document).on('click', '.trenes', function(e){
        e.preventDefault();
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr("idTren");
        let nombre = $(elemento).attr("nombreTren");
        $('#txtBuscarTren').val(nombre);
        $('#tren_id').val(id);
        $('#modalBuscarTren').modal('hide');

    });

    $(document).on('click', '.ruta', function(e){
        e.preventDefault();
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr("idRuta");
        let nombre = $(elemento).attr("nombreRuta");
        $('#txtBuscarRuta').val(nombre);
        $('#ruta_id').val(id);
        $('#modalBuscarRuta').modal('hide');

    });

    $('#btnBuscarRuta').on('click', function (e) {
        e.preventDefault();
        $('#modalBuscarRuta').modal('show');

        // let elemento = $(this)[0].parentElement.parentElement;
        // let id = $(elemento).attr("idTren");
        // let nombre = $(elemento).attr("nombreTren");
        // $('#txtBuscarTren').val(nombre);
        // $('#tren_id').val(id);
    });

    //btnBuscarRuta

    $('#btnBuscarTramos').on('click', function (e) {
        e.preventDefault();
        $('#modalBuscarTramos').modal('show');
    });

    $(document).on('click', '.btnSeleccionar', function (e) {
        e.preventDefault();
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr("idTramo");
        let nombre = $(elemento).attr("nombreTramo");
        let longitud = $(elemento).attr("longitudTramo");


        $('#tbodyTramos').append(`<tr>
            <td><input type="checkbox" name="" id="check-eliminar-todo"></td>
            <td>${id}</td>
            <td>${nombre}</td>
            <td>${longitud}</td>
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
