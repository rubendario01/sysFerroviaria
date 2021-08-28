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
        <h4 class="header-title">GESTION VAGONES</h4>
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
                                <a id="btnBuscarVagon" class="btn btn-primary" href=""><span class="ti-search"></span> Buscar vagon</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group mb-3 d-flex justify-content-end">
                    <div class="input-group-append">
                        <a href="{{route('vagon.insertar')}}" class="btn btn-success text-light"><span class="ti-plus"></span> Nuevo</a>
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
                            <th scope="col">ID</th>
                            <th scope="col">Nro vagon</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Capacidad</th>
                            <th scope="col">Tren</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vagones as $vagon)
                        <tr>
                            <th><input type="checkbox" name="" id=""></th>
                            <th scope="row">{{$vagon->id}}</th>
                            <td>{{$vagon->nro_vagon}}</td>
                            <td>{{$vagon->descripcion}}</td>
                            <td>{{$vagon->capacidad}}</td>
                            @if($vagon->tren['nombre']=='')
                                <td>Sin asignar</td>
                            @else
                                <td>{{$vagon->tren['nombre']}}</td>
                            @endif
                            <td>
                                <form action="{{route('vagon.destroy', $vagon->id)}}" method="post" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-xs">
                                        <i class="ti-trash"></i>
                                    </button>
                                </form>
                                <a href="{{route("vagon.modificar", $vagon->id)}}" class="btn btn-success btn-xs">
                                    <i class="ti-pencil"></i>
                                </a>
                            </td>
                            
                            
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@stop
