<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('reserva.index');
    }

    public function seleccionAsientos(){
        return view('reserva.seleccion-asiento');
    }
}
