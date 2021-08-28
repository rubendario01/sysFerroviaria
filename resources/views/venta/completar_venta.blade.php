@extends('templates.content')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="col p-0 m-0">
            {{-- Area informacion del cliente --}}
            <div class="card m-2 pl-2 pr-2">
                <h3 class="text-center m-2">DETALLE</h3>
                <div class="form-group m-2">
                    <label for="" class="">Cliente </label>
                    <div class="input-group">
                        {{-- <div class="input-group-append">
                            <a href="#" id="btnNuevoCliente" class="btn btn-primary">Nuevo</a>
                        </div> --}}
                        <input type="text" name="cliente" id="cliente" class="form-control"
                            placeholder="Ejem. Gonzalo Mendoza Martines">
                        <input type="hidden" name="cliente_id" id="cliente_id">
                        <div class="input-group-append">
                            <a href="#" id="btnBuscarCliente" class="btn btn-primary">Buscar</a>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{route('venta.cerrar_venta')}}" method="post">
                @csrf
                <div class="card m-2 pl-2 pr-2">
                    <label for="">Detalle de asientos reservados</label>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th><input type="checkbox" name="" id="check-eliminar-todo"></th>
                                        <th scope="col">Nro. Asiento</th>
                                        <th scope="col">Nro. Vagón</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($cont=0;$cont<count($detalles_boletos); $cont++) <tr>
                                        @php $detalle=$detalles_boletos[$cont]@endphp
                                        <th><input type="checkbox" name="" id=""></th>
                                        <td>{{$detalle->nro_asiento}}</td>
                                        <td>{{$detalle->vagon['nro_vagon']}}</td>
                                        <td>{{$viaje->precio}}</td>
                                        <td>
                                            <a href="" class="btn btn-primary btn-xs">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-xs">
                                                <i class="ti-trash"></i>
                                            </a>
                                        </td>
                                        </tr>
                                        @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                {{-- Area detalle de los asientos reservados --}}

                <div class="card m-2 pl-2 pr-2">
                    <div class="row m-2">
                        <div class="col card mr-2 border">
                            <div class="d-flex flex-column">
                                <p>Monto total</p>
                                <input type="hidden" name="monto" value="{{$monto_total}}">
                                <h3 class="text-center">{{$monto_total}}</h3>
                            </div>
                        </div>
                        {{-- <div class="col card mr-2 border">
                            <div class="d-flex flex-column">
                                <p>Monto Adeudado</p>
                                <h3 class="text-center">120.00</h3>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="card m-2 pl-2 pr-2">
                    <div class="input-group mb-3 mt-3">
                        <input type="text" class="form-control" placeholder="cantidad a pagar">
                        <div class="input-group-append">
                            <button type="submit" id="btnBuscarRuta" class="btn btn-primary" href="">Completar venta</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

{{-- Sección de los Modales --}}
{{-- MODAL PARA BUSCAR LOS CLIENTES YA REGISTRADOS --}}

<div class="modal fade bd-example-modal-lg" id="modalBuscarCliente">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Clientes Disponibles</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
        
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th><input type="checkbox" name="" id="check-eliminar-todo"></th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Telefono</th>
                          
                                    <th scope="col">Acciones</th>
        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                <tr idCliente="{{$cliente->id}}" nombre="{{$cliente->nombres}}">
                                    <th><input type="checkbox" name="" id=""></th>
                                    <th scope="row">{{$cliente->id}}</th>
                                    <td>{{$cliente->nombres}}</td>
                                    <td>{{$cliente->apellidos}}</td>
                                    <td>{{$cliente->telefono}}</td>
                                
                                    <td>
                                       
                                        <button class="btn btn-danger btn-xs btnSeleccionar">
                                            <i class="ti-hand-point-up"></i>
                                        </button>
                                      
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

{{-- MODAL PARA REEGISTRAR NUEVOS CLIENTES --}}
<div class="modal fade bd-example-modal-lg" id="modalNuevoCliente">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Trenes Disponibles</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
        
                <form action="{{route('venta.reg_cliente')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nombres</label>
                        <input value="{{old('nombres')}}" type="text" class="form-control" id="nombres" name="nombres" aria-describedby="emailHelp" placeholder="Ingrese nombres">
                        {{-- para mostrar errores --}}
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                            email with anyone else.</small> --}}
                            @error('nombres')
                            <span class="text-danger">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Apellidos</label>
                        <input value="{{old('apellidos')}}" type="text" class="form-control" id="apellidos"  name="apellidos" aria-describedby="emailHelp" placeholder="Ingrese apellidos">
                        {{-- para mostrar errores --}}
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                            email with anyone else.</small> --}}
                            @error('apellidos')
                            <span class="text-danger">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            @enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="">Telefono</label>
                        <input value="{{old('telefono')}}" type="number" class="form-control" id="telefono" name="telefono" aria-describedby="emailHelp" placeholder="Ingrese telefono">
                        {{-- para mostrar errores --}}
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                            email with anyone else.</small> --}}
                            @error('telefono')
                            <span class="text-danger">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo</label>
                        <input value="{{old('correo')}}" type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" placeholder="Ingrese correo">
                        {{-- para mostrar errores --}}
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                            email with anyone else.</small> --}}
                            @error('correo')
                            <span class="text-danger">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Guardar</button>
                    <button id="btnCerrarModalCliente" class="btn btn-danger mt-4 pr-4 pl-4">Cancelar</button>
                </form>
                
            </div>
            
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(document).on('click', '#btnBuscarCliente', function(e){
        $('#modalBuscarCliente').modal('show');
    });

    $(document).on('click', '#btnNuevoCliente', function(e){
        e.preventDefault();
        $('#modalNuevoCliente').modal('show');
    });

    $('#btnCerrarModalCliente').on('click', function(e){
        $('#modalNuevoCliente').modal('hide');
    });

    $(document).on('click', '.btnSeleccionar', function(e){
        e.preventDefault();
        let elemento=$(this)[0].parentElement.parentElement;
        let id=$(elemento).attr("idCliente");
        let nombre=$(elemento).attr("nombre");
       
        $("#cliente").val(nombre);
        $("#cliente_id").val(id);
        $('#modalBuscarCliente').modal('hide');  
    });

</script>
@stop
