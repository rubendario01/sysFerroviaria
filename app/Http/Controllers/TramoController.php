<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramo;
use App\Models\Ruta;
use App\Http\Requests\StoreTramo;
use App\Http\Requests\UpdateTramo;

class TramoController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $tramos = Tramo::paginate(5);

        return view('tramo.index')->with('tramos', $tramos);
    }
    public function insertar(){
        $rutas=Ruta::paginate(5);
        return view('tramo.insertar')->with('rutas', $rutas);
    }
    public function store(StoreTramo $request){
        Tramo::create($request->all());
        return redirect()->route('tramo.index');
    }
    public function modificar($id){
        $tramo = Tramo::findOrFail($id);
        return view('tramo.modificar')->with('tramo', $tramo);
    }

    public function update(UpdateTramo $request, $id){
        Tramo::findOrFail($id)->update($request->all());
        return redirect()->route('tramo.index');
    }

    public function destroy($id){
        Tramo::findOrFail($id)->delete();
        return redirect()->route('tramo.index');
    }
}
