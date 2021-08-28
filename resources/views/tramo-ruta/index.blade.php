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
            <div class="col-9">
                <form action="" method="get">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <input type="text" class="form-control" name="txtBuscar" placeholder="Buscar ..."
                                value="">
                        </li>
                        <li class="list-inline-item">
                            Campos
                            <select class="form-control">
                                <option>Select</option>
                                <option>Large select</option>
                                <option>Small select</option>
                            </select>
                        </li>
                        <li class="list-inline-item">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="col-3 d-flex justify-content-end pt-4 pb-4">
                <a href="{{route('tren.insertar')}}" class="btn btn-success text-light"><b>+</b> Nuevo</a>
            </div>
        </div>

        <h4 class="header-title">Gestión Trenes</h4>
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
                        <tr>
                            <th><input type="checkbox" name="" id=""></th>
                            <th scope="row">1</th>
                            <td>ABC123</td>
                            <td>Huracan</td>
                            <td>Tren de transporte de pasajeros</td>
                            <td>1998</td>
                            <td>400</td>
                            <td>
                                <a href="" class="btn btn-danger btn-xs">
                                    <i class="ti-trash"></i>
                                </a>
                                <a href="{{route("tren.modificar")}}" class="btn btn-success btn-xs">
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
