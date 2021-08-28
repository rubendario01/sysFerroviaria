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


        <h4 class="header-title">REGISTRAR NUEVO VAGON</h4>
        <form method="post" action="{{route('vagon.store')}}">
            @csrf
            <div class="form-group">
                <label for="">Nro</label>
                <input type="number" class="form-control" id="nro_vagon" name="nro_vagon" aria-describedby="emailHelp"
                    placeholder="Ingrese nro. bagon">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
                    @error('nro_vagon')
                    <span class="text-danger">
                        <small><strong>{{$message}}</strong></small>
                    </span>
                    @enderror
            </div>

            <div class="form-group">
                <label for="">Descripcion</label>
                <textarea rows='3' class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp"
                    placeholder="Ingrese descripcion"></textarea>
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
                    @error('descripcion')
                    <span class="text-danger">
                        <small><strong>{{$message}}</strong></small>
                    </span>
                    @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">capacidad</label>
                <input type="number" class="form-control" id="capacidad" name="capacidad" aria-describedby="emailHelp"
                    placeholder="Ingrese capacidad">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
                    @error('capacidad')
                    <span class="text-danger">
                        <small><strong>{{$message}}</strong></small>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="">Si lo desea, Seleccione un tren de pertenecia</label>
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" name="tren" id="tren" class="form-control" placeholder="tren...">
                        <input type="hidden" name="tren_id" id="id_tren">
                    </div>
                    <div class="col-md-2">
                        <a href="#" id="btnBuscarTren" class="btn btn-primary" style="width: 100%">Buscar</a>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Guardar</button>
            <a href="#" class="btn btn-danger mt-4 pr-4 pl-4">Cancelar</a>
        </form>

    </div>
</div>

{{-- Sección de los Modales --}}
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
                                    <th><input type="checkbox" name="" id="check-eliminar-todo"></th>
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
                                <tr idTren="{{$tren->id}}" nombre="{{$tren->nombre}}" modelo="{{$tren->modelo}}">
                                    <th><input type="checkbox" name="" id=""></th>
                                    <th scope="row">{{$tren->id}}</th>
                                    <td>{{$tren->codigo}}</td>
                                    <td>{{$tren->nombre}}</td>
                                    <td>{{$tren->descripcion}}</td>
                                    <td>{{$tren->modelo}}</td>
                                    <td>{{$tren->capacidad}}</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-xs btnSeleccionar">
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
    $('#btnBuscarTren').on('click', function (e) {
        e.preventDefault();
        $('#modalBuscarTren').modal('show');
    });


    $(document).on('click', '.btnSeleccionar', function(e){
        e.preventDefault();
        let elemento=$(this)[0].parentElement.parentElement;
        let id=$(elemento).attr("idTren");
        let nombre=$(elemento).attr("nombre");
        let modelo=$(elemento).attr("modelo");
        $("#tren").val(nombre +' - '+ modelo);
        $("#id_tren").val(id);
        $('#modalBuscarTren').modal('hide');  
    });

</script>
@stop
