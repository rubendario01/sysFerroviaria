<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuario;
use App\Http\Requests\UpdateUsuario;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }


    public function index(Request $request){
        $txtBuscar=trim($request->input('txtBuscar'));
        $opcionBuscar=$request->input('opcionBuscar');
        if($opcionBuscar!=""){
            if($opcionBuscar=='todo'){
                $usuarios=Usuario::where('id', 'LIKE', '%'.$txtBuscar.'%')
                    ->orWhere('name', 'LIKE', '%'.$txtBuscar.'%')
                    ->orWhere('email', 'LIKE', '%'.$txtBuscar.'%')
                        ->paginate(5);
            }else{
                $usuarios=Usuario::where($opcionBuscar, 'LIKE', '%'.$txtBuscar.'%')
                    ->paginate(5);
            }
        }else{
            $usuarios=Usuario::paginate(5);
        }

        return view('usuario.index')->with('usuarios', $usuarios)->with('txtBuscar', $txtBuscar);
    }

    public function insertar(){
        return view('usuario.insertar');
    }

    public function store(StoreUsuario $request){

        $informacionUsuario = $request->all();
        // si las contraseñas coinciden
        if($informacionUsuario['password'] == $informacionUsuario['password2']){
            $informacion['name'] = $informacionUsuario['nombres'];
            $informacion['email']=$informacionUsuario['correo'];
            $informacion['password']=Hash::make($informacionUsuario['password']);
            Usuario::create($informacion);
            $mensaje['codigo']="1";
            $mensaje['texto'] = "Usuario registrado con éxito";
            return redirect()->route('usuario.index')->with("mensaje", $mensaje);
        }else{
            $mensaje = "Las contraseñas no coinciden";
            return view('usuario.insertar')->with("mensaje", $mensaje);
        }

    }

    public function modificar($id){
        $usuario = Usuario::findOrFail($id);
        return view('usuario.modificar')->with('usuario', $usuario);
    }

    public function update(UpdateUsuario $request, $id){
        $informacionUsuario = $request->all();
        if($informacionUsuario['password'] == $informacionUsuario['password2']){
            //$informacion['id']=$id;
            $informacion['name']=$informacionUsuario['name'];
            $informacion['email']=$informacionUsuario['email'];
            $informacion['password']=Hash::make($informacionUsuario['password']);
            $usuario=Usuario::findOrFail($id);
            $usuario->update($informacion);
            return redirect()->route('usuario.index');
        }else{
            $mensaje= "Las contraseñas no coinciden";
            $usuario=Usuario::findOrFail($id);
            return view('usuario.modificar')->with('mensaje', $mensaje)->with('usuario', $usuario);
        } 
    }

    public function delete($id){
        Usuario::findOrFail($id)->delete();
        $mensaje['codigo']="1";
        $mensaje['texto']="El registro fue eliminado con éxito";
        return redirect()->route('usuario.index')->with($mensaje);
    }
}
