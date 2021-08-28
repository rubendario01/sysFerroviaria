@extends('templates.content')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12 card m-2">
            <h3 class="text-start m-2">REGISTRO NUEVA VENTA</h3>
            <div class="input-group mb-3">
        
                <input type="text" class="form-control" placeholder="Origen">
                <input type="text" class="form-control" placeholder="Destino">
                <input type="date" name="" class="form-control" id="">
        
                <div class="input-group-append">
                    <a id="btnBuscarRuta" class="btn btn-primary" href=""><span class="ti-search"></span> Buscar Viaje</a>
                </div>
            </div>
            <br>
            <label for="">Viajes Pogramados</label>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th><input type="checkbox" name="" id="check-eliminar-todo"></th>
                                <th scope="col">Detalles</th>
                                <th scope="col">Tren</th>
                                <th scope="col">Reservar Asiento</th>              
                                {{-- <th scope="col">Eliminar</th> --}}
                          
                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($viajes as $viaje)
                            <tr>
                                <th><input type="checkbox" name="" id=""></th>
        
                                <td>
                                    Fecha: {{$viaje->fecha}}
                                    <br>
                                    Horario: {{$viaje->horario}}
                                    <br>
                                    Origen: {{$viaje->origen}}
                                    <br>
                                    Destino: {{$viaje->destino}}
                                    <br>
                                    precio: {{$viaje->precio}}
                                    <br>
                                </td>
                                <td>{{$viaje->tren['nombre']}}</td>
                                <td>
                                    <a href="{{route('venta.insertar_boleto',['id'=>$viaje->tren['id'], 'viaje'=>$viaje->id]) }}" id="" class="btn btn-success btn-xs btnAsientos">
                                        <i class="fa fa-bus"></i> 
                                    </a>
                                    
                                </td>
                                <td>
                                    {{-- <a href="" class="btn btn-danger btn-xs">
                                        <i class="ti-trash"></i> 
                                    </a> --}}
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        {{-- <div class="col p-0 m-0">
     
            <div class="card m-2 pl-2 pr-2">
        
                <h3 class="text-center m-2">DETALLE</h3>
                <div class="form-group m-2">
                    <label for="" class="">Cliente </label>
                    <div class="input-group">
                        <input type="text" name="" id="" class="form-control" placeholder="Ejem. Gonzalo Mendoza Martines">
                        <div class="input-group-append">
                            <a href="#" class="btn btn-primary">Buscar</a>
                        </div>
                    </div>
        
                </div>
        
               
            </div>
        
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
                                <tr>
                                    <th><input type="checkbox" name="" id=""></th>
            
                                    
                                    <td>23</td>
                                    <td>5</td>
                                    <td>50 Bs.</td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-xs">
                                            <i class="ti-pencil"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-xs">
                                            <i class="ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        
        
            <div class="card m-2 pl-2 pr-2">
        
                <div class="row m-2">
                    <div class="col card mr-2 border">
                        <div class="d-flex flex-column">
                            <p>Monto total</p>
                            <h3 class="text-center">120.00</h3>    
                        </div>
                    </div>
                    <div class="col card mr-2 border">
                        <div class="d-flex flex-column">
                            <p>Monto Adeudado</p>
                            <h3 class="text-center">120.00</h3>    
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="card m-2 pl-2 pr-2">
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="cantidad a pagar">
                    <div class="input-group-append">
                        <a id="btnBuscarRuta" class="btn btn-primary" href="">Completar venta</a>
                    </div>
                </div>
            </div>
        
        </div> --}}

    </div>

</div>

{{-- Sección de los Modales --}}
<div class="modal fade bd-example-modal-lg" id="modalBuscarAsiento">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">GESTION DE BOLETOS</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body bg-light">
                <h6 class="text-center">Selecciona los asientos a reservar</h6>
                
              
                <div class="d-flex justify-content-center pb-2">
                    <div class="bg-success p-2 m-2">Disponibles</div>
                    <div class="bg-warning p-2 m-2">Fuera de servicio</div>
                    <div class="bg-danger p-2 m-2">Reservados</div>
                </div>

                <div class="row m-1">
                   
                    <div class="col-md-2">
                        <div class="card border bg-success" style="height:50px">
                            <div class="d-flex justify-content-center" style="width:100%; height:60%">
                                <h4>1</h4>
                            </div>
                            <div class="d-flex justify-content-center" style="width:100%; height:40%">
                                <input type="checkbox" name="" id="">
                            </div>
                        </div>
                    </div>

                <div class="d-flex justify-content-center m-3">
                    <button class="btn btn-primary">Agregar Asientos</button>
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
    document.addEventListener('DOMContentLoaded', function(event) {
        // $('.btnAsientos').on('click', function (e) {
        //     event.preventDefault();
        //     $('#modalBuscarAsiento').modal('show');
        //     console.log('hola');
        // });
    });
</script>
@stop
