@extends('templates.content')

@section('content')




<div class="card">
    <div class="card-body">


        <h4 class="header-title">REGISTRAR NUEVO ASIENTO</h4>
        <form method="post" action="{{route('asiento.store')}}">
            @csrf
            <div class="form-group">
                <label for="">Seleccione el vagon</label>
                <div class="">

                    <div class="input-group mb-3">

                        <input name="vagon" id="vagon" type="text" class="form-control" placeholder="Buscar vagon">
                        <input type="hidden" name="vagon_id" id="vagon_id">
                        <div class="input-group-append">
                            <a id="btnBuscarBagon" class="btn btn-primary" href=""><span class="ti-search"></span>
                                Buscar </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label for="">Número</label>
                <input type="number" class="form-control" id="nro_asiento" name="nro_asiento" aria-describedby="emailHelp"
                    placeholder="Ingrese nro asiento">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
            </div>

            <div class="form-group">
                <label for="">Descripcion</label>
                <textarea rows='3' class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp"
                    placeholder="Ingrese descripcion"></textarea>
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
            </div>

            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Guardar</button>
            <a href="#" class="btn btn-danger mt-4 pr-4 pl-4">Cancelar</a>
        </form>

    </div>
</div>
{{-- Sección de los Modales --}}
<div class="modal fade bd-example-modal-lg" id="modalBuscarBagon">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vagones Disponibles</h5>
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
                                    <th scope="col">Nro bagon</th>
                                    <th scope="col">Capacidad</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vagones as $vagon)
                                <tr idVagon="{{$vagon->id}}" descripcion="{{$vagon->descripcion}}">
                                    <th><input type="checkbox" name="" id=""></th>
                                    <th scope="row">{{$vagon->nro_vagon}}</th>
                                    <td>{{$vagon->descripcion}}</td>
                                    <td>{{$vagon->capacidad}}</td>

                                    <td>
                                        <a href="" class="btn btn-info btn-xs btnSeleccionar">
                                            <i class="ti-hand-point-up"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$vagones->links()}}
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
    $('#btnBuscarBagon').on('click', function (e) {
        e.preventDefault();
        $('#modalBuscarBagon').modal('show');
    });

    $(document).on('click', '.btnSeleccionar', function(e){
        e.preventDefault();
        let elemento=$(this)[0].parentElement.parentElement;
        let id=$(elemento).attr("idVagon");
        let descripcion=$(elemento).attr("descripcion");
       
        $("#vagon").val(descripcion);
        $("#vagon_id").val(id);
        $('#modalBuscarBagon').modal('hide');  
    });

</script>
@stop
