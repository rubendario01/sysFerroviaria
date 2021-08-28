<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Viaje;
use App\Models\Vagon;
use App\Models\Tren;
use App\Models\Asiento;
use App\Models\Cliente;
use App\Models\Venta;
use App\Models\Boleto;
use Carbon\Carbon;

class VentaController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('venta.index');
    }
    public function insertar(){
        $viajes = Viaje::all();
        return view('venta.insertar')->with('viajes', $viajes);
    }
    public function insertarBoleto($id, $viaje){
        $trenes = Tren::findOrFail($id);
        $vagones = $trenes->vagon;
        $viaje= Viaje::findOrFail($viaje);
       

        // DB::table('users')
        // ->join('contacts', 'users.id', '=', 'contacts.user_id')
        // ->join('orders', 'users.id', '=', 'orders.user_id')
        // ->select('users.*', 'contacts.phone', 'orders.price')
        // ->get();

        // DB::table('asiento')
        //     ->join('vagon', 'asiento.id', '=', 'vagon.vagon_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();


        //     $products = Product::join('products_warehouses','products.id','=','products_warehouses.product_id')
        //     ->join('categories', 'products.category_id', '=', 'categories.id')
        // // ->select('products.id', 'products.descripcion', 'products.precio', 'products.medida', 'categories.nombre')    
        //         ->where('categories.id',$opcionCategoria)
        //             ->where(function($products) use ($txtBuscar){
        //                 $products->where('descripcion', 'LIKE','%'.$txtBuscar.'%')
        //                 ->orWhere('products.id', 'LIKE','%'.$txtBuscar.'%');   
        //             })
        //                 ->orderBy('products.id', 'desc')
        //                     ->paginate(3);  

        $asientos = Asiento::select('asiento.id as id_asiento', 'asiento.nro_asiento', 'asiento.descripcion', 'vagon.id as id_vagon', 'vagon.nro_vagon', 'tren.id as id_tren')
        ->join('vagon', 'asiento.vagon_id', '=', 'vagon.id')
            ->join('tren', 'vagon.tren_id', '=', 'tren.id')
                ->where('tren.id',$id)->get();

        // $rut=Ruta::findOrFail($id);
        // $tramos=$rut->tramo;
        return view('venta.insertar_boleto')->with('vagones', $vagones)->with('asientos', $asientos)->with('viaje', $viaje);
            
    }
    public function modificar(){
        return view('venta.modificar');
    }

    public function completarVenta(Request $request, $id_viaje){
        $boletos = $request->input('asientos');
         // $sync_data = [];

        $cont=0;
        $detalles_boletos=[];

        $monto_total=0;
        while($cont<count($boletos)){
            // $detalles_boletos[$cont]=Asiento::select('asiento.id as id_asiento', 'asiento.nro_asiento', 'vagon.id as id_vagon', 'vagon.nro_vagon', 'vagon.descripcion')
            //                         ->join('vagon', 'asiento.vagon_id', '=', 'vagon.id')
            //                             ->where('asiento.id', $boletos[$cont])->get();
            $detalles_boletos[$cont]=Asiento::findOrFail($boletos[$cont]);
            $cont++;
            
        }
        $viaje=Viaje::findOrFail($id_viaje);
        $monto_total=$viaje->precio*count($boletos);

        // for($i = 0; $i < count($request->input('tramo_id')); $i++){
        //     $sync_data[$request->input('tramo_id')[$i]]; 
        // }
        // $detalles = $detalles_boletos[0];
        $clientes = Cliente::paginate(5);
        return view('venta.completar_venta')->with('detalles_boletos', $detalles_boletos)->with('viaje', $viaje)->with('monto_total', $monto_total)
            ->with('clientes', $clientes);
        
    }

    public function cerrarVenta(Request $request){
        $fecha = Carbon::now();
        $monto = $request->input('monto');
        $id_empleado = Auth::user()->tipo;

        $informacion_venta['fecha']=$fecha;
        $informacion_venta['monto']=$monto;
        $informacion_venta['empleado_id']=$id_empleado;

        
    

        

        // return $fecha->toDateString();
    }

    public function registrarClienteVenta(Request $request){
        Cliente::create($request->all());
        return back();
    }
}
