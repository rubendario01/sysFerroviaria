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
        <h4 class="header-title">GESTION TRAMOS</h4>

        <div class="row">
            <div class="col-9">
                <div class="col-9">
                    <form action="" method="get">
                        <div class="input-group mb-3">
    
                            <input type="text" class="form-control" placeholder="Buscar ...">
                            
                            <select name="" id="" class="form-control">
                                <option value="">Todo</option>
                            </select>
                    
                            <div class="input-group-append">
                                <a id="btnBuscarTramo" class="btn btn-primary" href=""><span class="ti-search"></span> Buscar tramos</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group mb-3 d-flex justify-content-end">
                    <div class="input-group-append">
                        <a href="{{route('tramo.insertar')}}" class="btn btn-success text-light"><span class="ti-plus"></span> Nuevo</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-table">
            <div class="table-responsive">
                <table class="table table-hover table-bordered progress-table text-center">
                    <thead class="text-uppercase">
                        <tr>
                            <th><input type="checkbox" name="" id="check-eliminar-todo"></th>
                            <th scope="col">ID</th>
                   
                            <th scope="col">Nombre</th>
                            <th scope="col">Longitud</th>
                            <th scope="col">Ruta</th>
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
                            <td>{{$tramo->ruta['nombre']}}</td>
                   
                            
                            <td>
                                <form style="display:inline" action="{{route('tramo.destroy', $tramo->id)}}" method="post">
                                    <button class="btn btn-danger btn-xs">
                                        <i class="ti-trash"></i>
                                    </button>
                                </form>
                                <a href="{{route("tramo.modificar", $tramo->id)}}" class="btn btn-success btn-xs">
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
