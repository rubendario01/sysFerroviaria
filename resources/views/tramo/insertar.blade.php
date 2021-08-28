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

        <h4 class="header-title">REGISTRAR NUEVO TRAMO</h4>

        <form method="post" action="{{route('tramo.store')}}">
            @csrf
            <div class="form-group">
                <label for="">Nombre</label>
                <input value="{{old('nombre')}}" type="text" class="form-control" id="nombre" name="nombre"
                    aria-describedby="emailHelp" placeholder="Ingrese nombre">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
                @error('nombre')
                <span class="text-danger">
                    <small><strong>{{$message}}</strong></small>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Longitud</label>
                <input value="{{old('longitud')}}" type="number" class="form-control" id="longitud" name="longitud"
                    aria-describedby="emailHelp" placeholder="Ingrese longitud">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
                @error('longitud')
                <span class="text-danger">
                    <small><strong>{{$message}}</strong></small>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Seleccione la ruta a la que pertenece el tramo</label>
                <div class="">

                    <div class="input-group mb-3">

                        <input name="ruta" id="ruta" type="text" class="form-control" placeholder="Buscar ruta">
                        <input type="hidden" name="ruta_id" id="ruta_id">
                        <div class="input-group-append">
                            <a id="btnBuscarRuta" class="btn btn-primary" href="#"><span class="ti-search"></span>
                                Buscar </a>
                        </div>
                    </div>

                </div>
            </div>



            {{-- <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Guardar</button> --}}
            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Guardar</button>
            <a href="{{route('tramo.index')}}" class="btn btn-danger mt-4 pr-4 pl-4">Cancelar</a>
        </form>

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
                                        <a href="" class="btn btn-danger btn-xs btnSeleccionar">
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
@stop

@section('js')
<script>

    $('#btnBuscarRuta').on('click', function (e) {
        e.preventDefault();
        $('#modalBuscarRuta').modal('show');
    });

    $(document).on('click', '.btnSeleccionar', function (e) {
        e.preventDefault();
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr("idRuta");
        let nombre = $(elemento).attr("nombreRuta");
        let longitud = $(elemento).attr("longitudRuta");

        $("#ruta").val(nombre);
        $("#ruta_id").val(id);
        $('#modalBuscarRuta').modal('hide');
    });

</script>
@stop
