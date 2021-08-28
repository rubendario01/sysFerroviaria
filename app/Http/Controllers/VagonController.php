<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vagon;
use App\Models\Tren;
use App\Http\Requests\StoreVagon;
use App\Http\Requests\UpdateVagon;

class VagonController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $vagones = Vagon::paginate(5);
        return view('vagon.index')->with('vagones', $vagones);
    }

    public function insertar(){
        $trenes = Tren::all();
        return view('vagon.insertar')->with('trenes', $trenes);
    }

    public function store(StoreVagon $request){
        Vagon::create($request->all());
        return redirect()->route('vagon.index');
    }

    public function modificar($id){
        $trenes = Tren::all();
        $vagon=Vagon::findOrFail($id);
        return view('vagon.modificar')->with('vagon', $vagon)->with('trenes', $trenes);
    }

    public function update(UpdateVagon $request, $id){
        Vagon::findOrFail($id)->update($request->all());
        return redirect()->route('vagon.index');
    }

    public function destroy($id){
        Vagon::findOrFail($id)->delete();
        return redirect()->route('vagon.index');
    }
}
