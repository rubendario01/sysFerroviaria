<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCliente;
use App\Http\Requests\UpdateCliente;
use App\Models\Cliente;
use App\Models\User;

class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        $txtBuscar=trim($request->input('txtBuscar'));
        $opcionBuscar=$request->input('opcionBuscar');
        if($opcionBuscar!=""){
            if($opcionBuscar=='todo'){
                $clientes=Cliente::where('id', 'LIKE', '%'.$txtBuscar.'%')
                    ->orWhere('nombres', 'LIKE', '%'.$txtBuscar.'%')
                    ->orWhere('apellidos', 'LIKE', '%'.$txtBuscar.'%')
                    ->orWhere('correo', 'LIKE', '%'.$txtBuscar.'%')
                        ->paginate(5);
            }else{
                $clientes=Cliente::where($opcionBuscar, 'LIKE', '%'.$txtBuscar.'%')
                    ->paginate(5);
            }
        }else{
            $clientes=Cliente::paginate(5);
        }

        return view('cliente.index')->with('clientes', $clientes)->with('txtBuscar', $txtBuscar);
    }

    public function insertar(){
        return view('cliente.insertar');
    }

    public function modificar($id){
        $cliente=Cliente::findOrFail($id);
        return view('cliente.modificar')->with('cliente', $cliente);
    }

    public function store(StoreCliente $request){
        Cliente::create($request->all());
        return redirect()->route('cliente.index');
    }

    public function update(UpdateCliente $request, $id){
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect()->route('cliente.index');
    }

    public function destroy($id){
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente.index');
    }

    public function agregarAsientos(){
        $registrosEliminar= $request->input('userEliminar');
        foreach($registrosEliminar as $registroEliminar){
            User::findOrFail($registroEliminar)->delete();
        }
        return back();
    }

    /*public function registrarUsuarioCliente(Request $request){
        // Pasando información para el cliente de regist
        
        $informacion=$request->all();

        // if($informacion['password']==$informacion['password2']){
            $cliente['nombres']=$informacion['nombres'];
            $cliente['apellidos']=$informacion['apellidos'];
            $cliente['telefono']=$informacion['telefono'];
            $clienteRegistrado=Cliente::create($cliente);
    
            $usuario["name"]=$informacion['name'];
            $usuario["email"]=$informacion['email'];
            $usuario["password"]=$informacion['password'];

            $usuarioRegistrado=Usuario::create($usuario);

            $clienteRegistrado->usuario()->save($usuarioRegistrado);
            return redirect()->route('administracion');
        // }else{
        //     return redirect()->route('register');
        // }
    }*/

}
