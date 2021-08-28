@extends('templates.content-login')

@section('content')
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="login-form-head">
                    <h4>Registrate!</h4>
                    <p>Hola!, Registrate y únete con nosotros</p>
                </div>
                <div class="login-form-body">
                    
                    <div class="form-gp">
                        <label for="name">Nombre usuario</label>
                        <input id="name" type="text" @error('name') is-invalid @enderror" name="name"
                            value="{{--{{ old('name') }}--}}" required autocomplete="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-gp">
                        <label for="email">Correo</label>
                        <input id="email" type="email" @error('email') is-invalid @enderror" name="email"
                            value="{{--{{ old('email') }}--}}" required autocomplete="email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-gp">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" @error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="tipo" value="cliente">
                    <div class="form-gp">
                        <label for="password-confirm">Confirmar contraseña</label>
                        <input id="password-confirm" type="password" name="password_confirmation" required
                            autocomplete="new-password">
                    </div>

                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Confirmar <i class="ti-arrow-right"></i></button>
           
                    </div>

                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Ya tienes una cuenta? <a href="{{route('login')}}">Inicia sesión</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
