<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tren;

use App\Http\Requests\StoreTren;
use App\Http\Requests\UpdateTren;

class TrenController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $trenes=Tren::paginate(5);
        return view('tren.index')->with('trenes', $trenes);
    }
    public function insertar(){
        return view('tren.insertar');
    }
    public function modificar($id){
        $tren = Tren::findOrFail($id);
        return view('tren.modificar')->with('tren', $tren);
    }
    public function store(StoreTren $request){
        Tren::create($request->all());
        return redirect()->route('tren.index');
    }

    public function update(UpdateTren $request, $id){
        Tren::findOrFail($id)->update($request->all());
        return redirect()->route('tren.index');
    }

    public function destroy($id){
        Tren::findOrFail($id)->delete();
        return redirect()->route('tren.index');
    }

}
