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
        <h4 class="header-title">GESTIÓN DE CLIENTES</h4>
        <div class="row">
            <div class="col-9">
                <form action="" method="get">
                    <div class="input-group mb-3">

                        <input value="{{$txtBuscar}}" name="txtBuscar" type="text" class="form-control" placeholder="Ingrese la información a buscar">
                        
                        <select name="opcionBuscar" id="opcionBuscar" class="form-control">
                            <option value="todo">Todo</option>
                            <option value="nombres">Nombres</option>
                            <option value="apellidos">Apellidos</option>
                            <option value="correo">Correo</option>
                        </select>
                
                        <div class="input-group-append">
                            <button type="submit" id="btnBuscarCliente" class="btn btn-primary"><span class="ti-search"></span> Buscar</button>
                        </div>
                        @if($txtBuscar!='')
                            <div class="input-group-append ml-2">
                                <a href="{{route('cliente.index')}}" id="btnBuscarCliente" class="btn btn-secondary" type="submit">ver todo</a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-3">
                <div class="input-group mb-3 d-flex justify-content-end">
                    <div class="input-group-append">
                        <a href="{{route('cliente.insertar')}}" class="btn btn-success text-light"><span class="ti-plus"></span> Nuevo</a>
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
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                            <th><input type="checkbox" name="" id=""></th>
                            <th scope="row">{{$cliente->id}}</th>
                            <td>{{$cliente->nombres}}</td>
                            <td>{{$cliente->apellidos}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td>{{$cliente->correo}}</td>
                            <td>
                                <form style="display:inline" method="post" action="{{route('cliente.destroy', $cliente->id)}}">
                                    @csrf 
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-xs">
                                        <i class="ti-trash"></i>
                                    </button>
                                </form>
                                <a href="{{route("cliente.modificar", $cliente->id)}}" class="btn btn-success btn-xs">
                                    <i class="ti-pencil"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{$clientes->links()}}
            </div>
        </div>
    </div>
</div>


@stop
