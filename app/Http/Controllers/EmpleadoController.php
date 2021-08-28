<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $empleados = Empleado::paginate(5);
        return view('empleado.index')->with('empleados', $empleados);
    }


    public function insertar(){
        return view('empleado.insertar');
    }
    
    public function store(Request $request){
        Empleado::create($request->all());
        return redirect()->route('empleado.index');
    }

    public function modificar($id){
        $empleado = Empleado::findOrFail($id);
        return view('empleado.modificar')->with('empleado', $empleado);
    }

    public function update(Request $request, $id){
        Empleado::findOrFail($id)->update($request->all());
        return redirect()->route('empleado.index');
    }

    public function destroy($id){
        Empleado::findOrFail($id)->delete();
        return redirect()->route('empleado.index');
    }
}
