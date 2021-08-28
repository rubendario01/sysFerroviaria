@extends('templates.content')
@section('css')
    <style>
        /* .card-principal-color{
            background-color:#F2F3F4;
        } */
    </style>
@stop
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



<div class="card card-principal-color">
    <div class="card-body">
        @if(isset($mensaje))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>ERROR AL GUARDAR: </strong> {{$mensaje['texto']}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h4 class="header-title">GESTIÓN DE USUARIOS</h4>

        <div class="row">
            <div class="col-8">
                <form action="" method="get">
                    <div class="input-group mb-3">

                        <input value="{{$txtBuscar}}" name="txtBuscar" type="text" class="form-control" placeholder="Ingrese la información a buscar">
                        
                        <select name="opcionBuscar" id="select_buscar" class="form-control">
                            <option value="todo">Todo</option>
                            <option value="name">Nombre</option>
                            <option value="email">Correo</option>
                        </select>
                
                        <div class="input-group-append">
                            <button id="btnBuscarUsuario" class="btn btn-primary" type="submit"><span class="ti-search"></span> Buscar</button>
                        </div>
                        @if($txtBuscar!='')
                            <div class="input-group-append ml-2">
                                <a href="{{route('usuario.index')}}" id="btnBuscarUsuario" class="btn btn-secondary" type="submit">ver todo</a>
                            </div>
                        @endif

                    </div>

                </form>
            </div>


            <div class="col-4">
                <div class="input-group mb-3 d-flex justify-content-end">
                    <div class="input-group-append">
                        <a href="{{route('usuario.insertar')}}" class="btn btn-success text-light"><span class="ti-plus"></span> Nuevo</a>
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
                            <th scope="col">Usuario</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Estado</th>
                           
                      
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <th><input type="checkbox" name="" id=""></th>
                            <th scope="row">{{$usuario->id}}</th>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->estado}}</td>
                        
                            <td>
                                <form action="{{route('usuario.destroy', $usuario->id)}}" method="post" style='display:inline'>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" href="" class="btn btn-danger btn-xs">
                                        <i class="ti-trash"></i>
                                    </button>
                                </form>
                                <a href="{{route("usuario.modificar", $usuario->id)}}" class="btn btn-success btn-xs">
                                    <i class="ti-pencil"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{$usuarios->links()}}
            </div>
        </div>
    </div>
</div>


@stop
