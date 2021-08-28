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
       

        <h4 class="header-title">MODIFICAR RUTA</h4>
        <form method="post" action="{{route('ruta.update', $ruta->id)}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="">Nombre</label>
                <input value="{{old('nombre', $ruta->nombre)}}" type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Ingrese nombre">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label for="">Longitud</label>
                <input value="{{old('longitud', $ruta->longitud)}}" type="number" class="form-control" id="longitud"  name="longitud" aria-describedby="emailHelp" placeholder="Ingrese longitud">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
            </div>
            
            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Modificar</button>
            <a href="{{route('ruta.index')}}" class="btn btn-danger mt-4 pr-4 pl-4">Cancelar</a>
        </form>
        
    </div>
</div>


@stop
