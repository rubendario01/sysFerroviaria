<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;
use App\Models\Tramo;
use App\Http\Requests\StoreRuta;
use App\Http\Requests\UpdateRuta;

class RutaController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $tramos = Tramo::paginate(5);
        $rutas=Ruta::paginate(5);

        return view('ruta.index')->with('rutas', $rutas)->with('tramos', $tramos);
    }
    public function insertar(){
        return view('ruta.insertar');
    }

    public function store(StoreRuta $request){

        $rut=Ruta::create($request->all())->id;
        $ruta_informacion=Ruta::findOrFail($rut);
        return redirect()->route('ruta.index');
        // return view('ruta.opciones')->with("ruta_informacion", $ruta_informacion);
    }
    public function modificar($id){
        $ruta=Ruta::findOrFail($id);
        return view('ruta.modificar')->with('ruta', $ruta);
    }

    public function update(UpdateRuta $request, $id){
        Ruta::findOrFail($id)->update($request->all());
        return redirect()->route('ruta.index');
    }

    public function destroy($id){
        Ruta::findOrFail($id)->delete();
        return redirect()->route('ruta.index');
    }

    public function insertarTramos($id){
        $tramos = Tramo::paginate(5);
        $rut=Ruta::findOrFail($id);
        return view('tramo-ruta.insertar')->with('rut', $rut)->with('tramos', $tramos);
    }

    public function agregarTramos($id){
        $tramos = Tramo::paginate(5);
        $rut=Ruta::findOrFail($id);
        return view('ruta.agregar_tramos')->with('rut', $rut)->with('tramos', $tramos);
    }

    public function verTramos($id){
        //$tramos = Tramo::findOrFail($id)->;
        //return Supplier::find($id)->products;

        $rut=Ruta::findOrFail($id);
        $tramos=$rut->tramo;
        // Supplier::has('products')->where('name', $name)->get();  
        // $tramos=Tramo::has('ruta')->where('ruta_id', $id)->get();  
        // $tramos=$rut->tramo;
        return view('ruta.ver_tramos')->with('rut', $rut)->with('tramos', $tramos); 
    }

    public function storeTramos(Request $request, $id){
        $ruta=Ruta::findOrFail($id);
        // $sync_data = [];

        // for($i = 0; $i < count($request->input('tramo_id')); $i++){
        //     $sync_data[$request->input('tramo_id')[$i]]; 
        // }
     

        $ruta->tramo()->sync($request->get('tramo_id'));

        // $tramo_id=$request->get('tramo_id');
        // $cont=0;
        
        // while($cont<count($tramo_id)){

        // }
        return redirect()->route('ruta.index');
    }

    public function opciones(){
        return view('ruta.opciones');
    }
}
