<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tren;
use App\Models\Tramo;
use App\Models\Ruta;
use App\Models\Viaje;

class ViajeController extends Controller
{
    //

    public function index(){
        $viajes = Viaje::paginate(5);
        return view('viaje.index')->with('viajes', $viajes);
    }
    public function insertar(){
        $trenes = Tren::paginate(5);
        $rutas = Ruta::paginate(5);
        $tramos = Tramo::paginate(5);
        return view('viaje.insertar')->with('trenes', $trenes)->with('tramos', $tramos)->with('rutas', $rutas);
    }

    public function store(Request $request){
        Viaje::create($request->all());
        return redirect()->route('viaje.index');
    }

    public function modificar(){
        return view('viaje.modificar');
    }

}
