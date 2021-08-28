<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolController extends Controller
{
    //
    public function index(){
        return view('rol.index');
    }

    public function insertar(){
        
        return view('rol.insertar');
    }

    public function modificar(){
        return view('rol.modificar');
    }

}
