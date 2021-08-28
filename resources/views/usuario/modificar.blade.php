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
       

        <h4 class="header-title">Actualizar la información de usuario</h4>
        @if(isset($mensaje))
            <div class="text-center alert alert-warning alert-dismissible fade show" role="alert" >
                <strong>ERROR AL MODIFICAR: </strong> {{$mensaje}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form method="post" action="{{route('usuario.update', $usuario->id)}}">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="">Nombre usuario</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Ingrese nombres" value="@if(old('name')==''){{$usuario->name}}@else{{old('name')}}@endif">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
                @error('name')
                <span class="text-danger">
                    <small><strong>{{$message}}</strong></small>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Correo</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Ingrese correo" value={{$usuario->email}}>
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}

                @error('email')
                <span class="text-danger">
                    <small><strong>{{$message}}</strong></small>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" class="form-control" id="password"  name="password" aria-describedby="emailHelp" placeholder="Ingrese Contraseña">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}

                @error('password')
                <span class="text-danger">
                    <small><strong>{{$message}}</strong></small>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label for="">Repita la contraseña</label>
                <input type="password" class="form-control" id="password2"  name="password2" aria-describedby="emailHelp" placeholder="Repita la contraseña">
                {{-- para mostrar errores --}}
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small> --}}
            </div>
            {{-- <div class="form-group">
                <label for="">Rol</label>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <a id="btnBuscarRuta" class="btn btn-primary" href=""><span class=""></span> Nuevo</a>
                    </div>
                    <input type="text" class="form-control" placeholder="Seleccioné un rol">
                    
                    <div class="input-group-append">
                        <a id="btnBuscarRuta" class="btn btn-primary" href=""><span class="ti-search"></span> Buscar Rol</a>
                    </div>
                </div>
            </div> --}}
            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Modificar</button>
            <a href="{{route('usuario.index')}}" class="btn btn-danger mt-4 pr-4 pl-4">Cancelar</a>
        </form>
        
    </div>
</div>


@stop
