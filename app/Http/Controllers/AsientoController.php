<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asiento;
use App\Models\Vagon;
use App\Http\Requests\StoreAsiento;
use App\Http\Requests\UpdateAsiento;

class AsientoController extends Controller
{
    //
    public function index(){
        $asientos = Asiento::paginate(5);
        return view('asiento.index')->with('asientos', $asientos);
    }

    public function insertar(){
        $vagones=Vagon::paginate(5);
        return view('asiento.insertar')->with('vagones', $vagones);
    }

    public function store(StoreAsiento $request){
        Asiento::create($request->all());
        return redirect()->route('asiento.index');
    }

    public function modificar($id){
        $vagones=Vagon::paginate(5);
        $asiento=Asiento::findOrFail($id);
        return view('asiento.modificar')->with('asiento', $asiento)->with('vagones', $vagones);
    }

    public function update(UpdateAsiento $request, $id){
        Asiento::findOrFail($id)->update($request->all());
        return redirect()->route('asiento.index');
    }

    public function destroy($id){
        Asiento::findOrFail($id)->delete();
        return redirect()->route('asiento.index');
    }
}
