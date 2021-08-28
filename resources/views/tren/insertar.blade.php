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
       

        <h4 class="header-title">REGISTRAR NUEVO TREN</h4>
        <form method="post" action="{{route('tren.store')}}">
            @csrf
            <div class="form-group">
                <label for="">Codigo</label>
                <input value="{{old('codigo')}}" type="number" class="form-control" id="codigo" name="codigo" aria-describedby="emailHelp" placeholder="Ingrese codigo">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
                    @error('codigo')
                    <span class="text-danger">
                        <small><strong>{{$message}}</strong></small>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="">Nombre</label>
                <input value="{{old('nombre')}}" type="text" class="form-control" id="nombre"  name="nombre" aria-describedby="emailHelp" placeholder="Ingrese nombre">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
                    @error('nombre')
                    <span class="text-danger">
                        <small><strong>{{$message}}</strong></small>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="">Descripcion</label>
                <textarea value="{{old('descripcion')}}" rows='3' class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp" placeholder="Ingrese descripcion"></textarea>
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
                    @error('descripcion')
                    <span class="text-danger">
                        <small><strong>{{$message}}</strong></small>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Modelo</label>
                <input value="{{old('modelo')}}" type="text" class="form-control" id="modelo" name="modelo" aria-describedby="emailHelp" placeholder="Ingrese modelo">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
                    @error('modelo')
                    <span class="text-danger">
                        <small><strong>{{$message}}</strong></small>
                    </span>
                    @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">capacidad</label>
                <input value="{{old('capacidad')}}" type="number" class="form-control" id="capacidad" name="capacidad" aria-describedby="emailHelp" placeholder="Ingrese capacidad">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
                    @error('capacidad')
                    <span class="text-danger">
                        <small><strong>{{$message}}</strong></small>
                    </span>
                    @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Guardar</button>
            <a href="#" class="btn btn-danger mt-4 pr-4 pl-4">Cancelar</a>
        </form>
        
    </div>
</div>


@stop
