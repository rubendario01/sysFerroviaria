<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome2', function(){
    return view('welcome2');
});

Route::get('/administracion', function () {
    return view('administracion');
})->name('administracion');

Route::get('/rol', 'App\Http\Controllers\RolController@index')->name('rol.index');
// Ruta para ir al formulario de insertar rol
Route::get('/rol/insertar', 'App\Http\Controllers\RolController@insertar')->name('rol.insertar');
// Ruta para guardar el rol 
Route::post('/rol/insertar/', 'App\Http\Controllers\RolController@insertar')->name('rol.insertar');

// RUTAS USUARIOS
// Ruta para ir al menu principal de usuarios
Route::get('/usuario', 'App\Http\Controllers\UsuarioController@index')->name('usuario.index');
// abrir el formulario de creación de nuevo usuario
Route::get('/usuario/insertar', 'App\Http\Controllers\UsuarioController@insertar')->name('usuario.insertar');
// ruta  almacenar store) información de usuario
Route::post('/usuario/insertar', 'App\Http\Controllers\UsuarioController@store')->name('usuario.store');
// Abrir el formulario de actualización de datos de un usuario
Route::get('/usuario/modificar/{usuario}', 'App\Http\Controllers\UsuarioController@modificar')->name('usuario.modificar');
// ruta para actualizar los datos del usuario registrado
Route::put('/usuario/modificar/{usuario}', 'App\Http\Controllers\UsuarioController@update')->name('usuario.update');
// rutal para eliminar los datos de un usuario registrado
Route::delete('/usuario/eliminar/{usuario}', 'App\Http\Controllers\UsuarioController@delete')->name('usuario.destroy');



Route::get('/rol/modificar', 'App\Http\Controllers\RolController@modificar')->name('rol.modificar');

// Rutas del cliente
Route::get('/cliente', 'App\Http\Controllers\ClienteController@index')->name('cliente.index');
Route::get('/cliente/insertar', 'App\Http\Controllers\ClienteController@insertar')->name('cliente.insertar');
Route::get('/cliente/modificar/{cliente}', 'App\Http\Controllers\ClienteController@modificar')->name('cliente.modificar');
Route::post('/cliente/insertar', 'App\Http\Controllers\ClienteController@store')->name('cliente.store');
Route::put('/cliente/modificar/{cliente}', 'App\Http\Controllers\ClienteController@update')->name('cliente.update');
Route::delete('/cliente/eliminar/{cliente}', 'App\Http\Controllers\ClienteController@destroy')->name('cliente.destroy');
Route::post('/cliente/registrar_usuario', 'App\Http\Controllers\ClienteController@registrarUsuarioCliente')->name('cliente.registrar_usuario');


// Empleado
Route::get('/empleado', 'App\Http\Controllers\EmpleadoController@index')->name('empleado.index');
Route::get('/empleado/insertar', 'App\Http\Controllers\EmpleadoController@insertar')->name('empleado.insertar');
Route::post('/empleado/store', 'App\Http\Controllers\EmpleadoController@store')->name('empleado.store');

Route::get('/empleado/modificar/{empleado}', 'App\Http\Controllers\EmpleadoController@modificar')->name('empleado.modificar');
Route::put('/empleado/modificar/{empleado}', 'App\Http\Controllers\EmpleadoController@update')->name('empleado.update');
Route::delete('/empleado/eliminar/{empleado}', 'App\Http\Controllers\EmpleadoController@destroy')->name('empleado.destroy');


// Tramos
Route::get('/tramo', 'App\Http\Controllers\TramoController@index')->name('tramo.index');
Route::get('/tramo/insertar', 'App\Http\Controllers\TramoController@insertar')->name('tramo.insertar');
Route::post('/tramo/store', 'App\Http\Controllers\TramoController@store')->name('tramo.store');
Route::get('/tramo/modificar/{tramo}', 'App\Http\Controllers\TramoController@modificar')->name('tramo.modificar');
Route::put('/tramo/update/{tramo}', 'App\Http\Controllers\TramoController@update')->name('tramo.update');
Route::put('/tramo/eliminar/{tramo}', 'App\Http\Controllers\TramoController@destroy')->name('tramo.destroy');

// Rutas
Route::get('/ruta', 'App\Http\Controllers\RutaController@index')->name('ruta.index');
Route::get('/ruta/insertar', 'App\Http\Controllers\RutaController@insertar')->name('ruta.insertar');
Route::post('/ruta/store', 'App\Http\Controllers\RutaController@store')->name('ruta.store');
Route::get('/ruta/modificar/{ruta}', 'App\Http\Controllers\RutaController@modificar')->name('ruta.modificar');
Route::put('/ruta/update/{ruta}', 'App\Http\Controllers\RutaController@update')->name('ruta.update');
Route::delete('/ruta/eliminar/{ruta}', 'App\Http\Controllers\RutaController@destroy')->name('ruta.destroy');
Route::get('/ruta/insertar/opciones', 'App\Http\Controllers\RutaController@opciones')->name('ruta.opciones');


Route::get('/ruta/ver/tramos/{ruta}', 'App\Http\Controllers\RutaController@verTramos')->name('ruta.ver-tramos');
Route::get('/ruta/agregar/tramos/{ruta}', 'App\Http\Controllers\RutaController@agregarTramos')->name('ruta.agregar-tramos');


Route::get('/ruta/insertar/tramos/{ruta}', 'App\Http\Controllers\RutaController@insertarTramos')->name('ruta.insertar-tramos');
Route::post('/ruta/insertar/tramos/{ruta}', 'App\Http\Controllers\RutaController@storeTramos')->name('ruta.store-tramos');

// Trenes
Route::get('/tren', 'App\Http\Controllers\TrenController@index')->name('tren.index');
Route::get('/tren/insertar', 'App\Http\Controllers\TrenController@insertar')->name('tren.insertar');
Route::post('/tren/insertar', 'App\Http\Controllers\TrenController@store')->name('tren.store');

Route::get('/tren/modificar/{tren}', 'App\Http\Controllers\TrenController@modificar')->name('tren.modificar');
Route::put('/tren/modificar/{tren}', 'App\Http\Controllers\TrenController@update')->name('tren.update');

Route::delete('/tren/eliminar/{tren}', 'App\Http\Controllers\TrenController@destroy')->name('tren.destroy');



// Vagon
Route::get('/vagon', 'App\Http\Controllers\VagonController@index')->name('vagon.index');
Route::get('/vagon/insertar', 'App\Http\Controllers\VagonController@insertar')->name('vagon.insertar');
Route::post('/vagon/store', 'App\Http\Controllers\VagonController@store')->name('vagon.store');
Route::get('/vagon/modificar/{vagon}', 'App\Http\Controllers\VagonController@modificar')->name('vagon.modificar');
Route::put('/vagon/update/{vagon}', 'App\Http\Controllers\VagonController@update')->name('vagon.update');
Route::delete('/vagon/eliminar/{vagon}', 'App\Http\Controllers\VagonController@destroy')->name('vagon.destroy');


// Asiento
Route::get('/asiento', 'App\Http\Controllers\AsientoController@index')->name('asiento.index');
Route::get('/asiento/insertar', 'App\Http\Controllers\AsientoController@insertar')->name('asiento.insertar');
Route::post('/asiento/store', 'App\Http\Controllers\AsientoController@store')->name('asiento.store');
Route::get('/asiento/modificar/{asiento}', 'App\Http\Controllers\AsientoController@modificar')->name('asiento.modificar');
Route::put('/asiento/modificar/{asiento}', 'App\Http\Controllers\AsientoController@update')->name('asiento.update');
Route::delete('/asiento/eliminar/{asiento}', 'App\Http\Controllers\AsientoController@destroy')->name('asiento.destroy');

// Viaje
Route::get('/viaje', 'App\Http\Controllers\ViajeController@index')->name('viaje.index');
Route::get('/viaje/insertar', 'App\Http\Controllers\ViajeController@insertar')->name('viaje.insertar');
Route::post('/viaje/store', 'App\Http\Controllers\ViajeController@store')->name('viaje.store');
Route::get('/viaje/modificar', 'App\Http\Controllers\ViajeController@modificar')->name('viaje.modificar');


// Venta
Route::get('/venta', 'App\Http\Controllers\VentaController@index')->name('venta.index');
Route::get('/venta/insertar', 'App\Http\Controllers\VentaController@insertar')->name('venta.insertar');

// Route::get('/venta/insertar_boleto/{informacion}', 'App\Http\Controllers\VentaController@insertarBoleto')->name('venta.insertar_boleto');
Route::get('events/{id}/remind/{viaje}', [
    'as' => 'venta.insertar_boleto', 'uses' => 'App\Http\Controllers\VentaController@insertarBoleto']);

Route::post('/venta/completar_venta/{id_viaje}', 'App\Http\Controllers\VentaController@completarVenta')->name('venta.completar_venta');
Route::post('/venta/cerrar_venta',  'App\Http\Controllers\VentaController@cerrarVenta')->name('venta.cerrar_venta');
Route::get('/venta/modificar', 'App\Http\Controllers\VentaController@modificar')->name('venta.modificar');
Route::post('/venta/reg_cliente',  'App\Http\Controllers\VentaController@registrarClienteVenta')->name('venta.reg_cliente');

Route::get('/reserva', 'App\Http\Controllers\ReservaController@index')->name('reserva.modificar');
Route::get('/reserva/seleccion-asientos', 'App\Http\Controllers\ReservaController@seleccionAsientos')->name('reserva.seleccionAsientos');









