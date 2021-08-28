
 @if(Auth::user()->tipo=='cliente')
    @include('reserva.index')
@elseif(Auth::user()->tipo=='empleado' || Auth::user()->tipo=='administrador')
    @include('templates.content')
 @endif
 

