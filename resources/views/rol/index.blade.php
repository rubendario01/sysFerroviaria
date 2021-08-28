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
        <div class="row">
            <div class="col-8">
                <form action="" method="get">
                    <div class="input-group mb-3">

                        <input type="text" class="form-control" placeholder="Ingrese la información a buscar">
                        
                        <div class="input-group-append">
                            <a id="btnBuscarRuta" class="btn btn-primary" href=""><span class="ti-search"></span> Buscar Rol</a>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-4">
                <div class="input-group mb-3 d-flex justify-content-end">
                    <div class="input-group-append">
                        <a href="{{route('rol.insertar')}}" class="btn btn-success text-light"><b>+</b> Nuevo</a>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="header-title">GESTIÓN ROLES DE USUARIO</h4>
        <div class="single-table">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead class="text-uppercase">
                        <tr>
                            <th><input type="checkbox" name="" id="check-eliminar-todo"></th>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><input type="checkbox" name="" id=""></th>
                            <th scope="row">1</th>
                            <td>Administrador</td>
                           
                            <td>
                                <a href="" class="btn btn-danger btn-xs">
                                    <i class="ti-trash"></i>
                                </a>
                                <a href="{{route("rol.modificar")}}" class="btn btn-success btn-xs">
                                    <i class="ti-pencil"></i>
                                </a>
                            </td>
                            
                            
                           
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@stop
