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
       

        <h4 class="header-title">ACTUALIZAR INFORMACION EMPLEADO</h4>
        <form method="post" action="{{route('empleado.update', $empleado->id)}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="">Nombres</label>
                <input value="{{old('nombre', $empleado->nombre)}}" type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Ingrese nombres">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label for="">Apellidos</label>
                <input value="{{old('apellidos', $empleado->apellidos)}}" type="text" class="form-control" id="apellidos"  name="apellidos" aria-describedby="emailHelp" placeholder="Ingrese apellidos">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label for="">Telefono</label>
                <input value="{{old('telefono', $empleado->telefono)}}" type="number" class="form-control" id="telefono" name="telefono" aria-describedby="emailHelp" placeholder="Ingrese telefono">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
            </div>

            <div class="form-group">
                <label for="">Direccion</label>
                <textarea rows='3' class="form-control" id="direccion" name="direccion" aria-describedby="emailHelp" placeholder="Ingrese direccion">{{old('direccion', $empleado->direccion)}}</textarea>
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
            </div>

            
            <div class="form-group">
                <label for="exampleInputEmail1">Correo</label>
                <input value="{{old('email', $empleado->email)}}" type="email" class="form-control" id="correo" name="email" aria-describedby="emailHelp" placeholder="Ingrese correo">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
            </div>
            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Modificar</button>
            <a href="{{rout('empleado.index')}}" class="btn btn-danger mt-4 pr-4 pl-4">Cancelar</a>
        </form>
        
    </div>
</div>


@stop
