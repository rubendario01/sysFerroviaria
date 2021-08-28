@extends('templates.content-login')

@section('content')
<!-- login area start -->
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form  method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-form-head">
                    <h4>Inicio de Sesión</h4>
                    {{-- <p>Hola!</p> --}}
                </div>
                <div class="login-form-body">
                    <div id="gp-email" class="form-gp">


                        <label for="email">Dirección de correo</label>
                    
                        <input id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
            
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <i class="ti-email"></i>
                        <div class="text-danger"></div>
                    </div>

                    <div id="gp-password" class="form-gp">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password"  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>

                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                               
                                <input class="custom-control-input"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            @if (Route::has('password.request'))
                                <a  href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>

                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        {{-- <div class="login-other row mt-4">
                            <div class="col-6">
                                <a class="fb-login" href="#">Log in with <i class="fa fa-facebook"></i></a>
                            </div>
                            <div class="col-6">
                                <a class="google-login" href="#">Log in with <i class="fa fa-google"></i></a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Don't have an account? <a href="{{route('register')}}">Sign up</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('js_login')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        console.log($('#email').val());
        if($('#email').val().length>0){
            $('#gp-email').addClass('focused');
        }

        // if($('#password').val().length>0){
        //     $('#gp-password').addClass('focused');
        // }
    })
</script>
@stop

