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
        <h4 class="header-title">GESTION VIAJES</h4>
        <div class="row">
            <div class="col-9">
                <div class="col-9">
                    <form action="" method="get">
                        <div class="input-group mb-3">
    
                            <input type="text" class="form-control" placeholder="Buscar ... ">
                            
                            <select name="" id="" class="form-control">
                                <option value="">Todo</option>
                            </select>
                    
                            <div class="input-group-append">
                                <a id="btnBuscarViaje" class="btn btn-primary" href=""><span class="ti-search"></span> Buscar viaje</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group mb-3 d-flex justify-content-end">
                    <div class="input-group-append">
                        <a href="{{route('viaje.insertar')}}" class="btn btn-success text-light"><span class="ti-plus"></span> Nuevo</a>
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
                            <th scope="col">Fecha</th>
                            <th scope="col">Horario</th>
                            <th scope="col">Origen</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Ruta</th>
                            <th scope="col">Tren</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($viajes as $viaje)
                        <tr>
                            <th><input type="checkbox" name="" id=""></th>
                            <th scope="row">{{$viaje->id}}</th>
                            <td>{{$viaje->fecha}}</td>
                            <td>{{$viaje->horario}}</td>
                            <td>{{$viaje->origen}}</td>
                            <td>{{$viaje->destino}}</td>
                            <td>{{$viaje->ruta['nombre']}}</td>
                            <td>{{$viaje->tren['nombre']}}</td>
                            <td>
                                <a href="" class="btn btn-danger btn-xs">
                                    <i class="ti-trash"></i>
                                </a>
                                <a href="{{route("viaje.modificar")}}" class="btn btn-success btn-xs">
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
