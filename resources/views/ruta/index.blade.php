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
        <h4 class="header-title">GESTION RUTAS</h4>

        <div class="row">
            <div class="col-9">
                <div class="col-9">
                    <form action="" method="get">
                        <div class="input-group mb-3">

                            <input type="text" class="form-control" placeholder="Ingrese la información a buscar">

                            <select name="" id="" class="form-control">
                                <option value="">Todo</option>
                            </select>

                            <div class="input-group-append">
                                <a id="btnBuscarRuta" class="btn btn-primary" href=""><span class="ti-search"></span>
                                    Buscar ruta</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group mb-3 d-flex justify-content-end">
                    <div class="input-group-append">
                        <a href="{{route('ruta.insertar')}}" class="btn btn-success text-light"><span
                                class="ti-plus"></span> Nuevo</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-table">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead class="text-uppercase">
                        <tr>
                            <th><input type="checkbox" name="" id="check-eliminar-todo"></th>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Longitud</th>

                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rutas as $ruta)
                        <tr idRuta="{{$ruta->id}}" nombreRuta="{{$ruta->nombre}}">
                            <th><input type="checkbox" name="" id=""></th>
                            <th scope="row">{{$ruta->id}}</th>
                            <td>{{$ruta->nombre}}</td>
                            <td>{{$ruta->longitud}}</td>

                            <td>
                                <form method="post" action="{{route('ruta.destroy', $ruta->id)}}" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-xs">
                                        <i class="ti-trash"></i>
                                    </button>
                                </form>
                                <a href="{{route("ruta.modificar", $ruta->id)}}" class="btn btn-success btn-xs">
                                    <i class="ti-pencil"></i>
                                </a>
                                {{-- <a href="{{route('ruta.ver-tramos', $ruta->id)}}" class="btn btn-success btn-xs tramos">
                                    <i class=""></i>Tramos
                                </a> --}}
                            </td>



                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$rutas->links()}}
            </div>
        </div>
    </div>
</div>

{{-- Sección de los Modales --}}
<div class="modal fade bd-example-modal-lg" id="modalTramosRuta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">RUTA - TRAMOS</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-group text-center">
                            <label for="" class="text-center">Rutal actual</label>
                            <input name="rutaActual" id="rutaActual" type="text" class="form-control" value="Tarija - Santa Cruz" disabled>
                            <input type="hidden" name="ruta_id" id="ruta_id">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    {{-- <label for=""></label> --}}
                    <div class="col-10">
                        
                        <div class="input-group mb-3">
    
                            <input type="text" class="form-control" placeholder="Ingresa el tramos a buscar">
    
                            <select name="" id="" class="form-control">
                                <option value="">Todo</option>
                            </select>
    
                            <div class="input-group-append">
                                <a id="btnBuscarTramos" class="btn btn-primary" href=""><span class="ti-search"></span>
                                    Buscar tramo</a>
                            </div>
                        </div>
    
                    </div>
                </div>
                <h6>TRAMOS QUE COMPONEN LA RUTA</h6>
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
                            <tbody>
                                
                                <tr>
                                    <td><input type="checkbox" name="" id="check-eliminar-todo"></td>
                                    <td>Tarija - Abapo</td>
                                    <td>
                                        <a href="" class="btn btn-danger btn-xs">
                                            <i class="ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Modificar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="modalBuscarTramo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">TRAMOS</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                   
                </div>

                <div class="row justify-content-center">
                    {{-- <label for=""></label> --}}
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
                </div>
                <h6>TRAMOS DISPONIBLES/h6>
                <div class="single-table mt-3">
                    <div class="table-responsive">

                        <table class="table table-hover table-bordered progress-table text-center">
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
                                @foreach ($tramos as $tramo)
                                <tr>
                                    <th><input type="checkbox" name="" id=""></th>
                                    <th scope="row">{{$tramo->id}}</th>
                                    <td>{{$tramo->nombre}}</td>
                                    <td>{{$tramo->longitud}}</td>
                           
                                    
                                    <td>
                                     
                                        <a class="btn btn-success btn-xs">
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
                <button class="btn btn-primary">Modificar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


@stop

@section('js')
<script>
    $(document).on('click', '.tramos' ,function (e) {
        // e.preventDefault();
        // let elemento=$(this)[0].parentElement.parentElement;
        // let id=$(elemento).attr("idRuta");
        // let nombre=$(elemento).attr("nombreRuta");
       
        // $("#rutaActual").val(nombre);
        // $("#ruta_id").val(id);
      
        // $('#modalTramosRuta').modal('show');

    });

    $(document).on('click', '#btnBuscarTramos', function(e){
        e.preventDefault();
        $('#modalBuscarTramo').modal('show');
    })

</script>
@stop
