<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Anuncio_administradorController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\PagarController;
use App\Http\Controllers\PagoexitosoController;
use App\Http\Controllers\ResidenteController;
use App\Http\Controllers\TablaController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservaController;

use App\Http\Controllers\CompraWebPayController;
use App\Models\Cuenta_morosa;
use App\Models\Admincondominio;
use Illuminate\Support\Facades\Route;
use App\Models\Libro;
use App\Models\Reserva;
use App\Models\Anuncio_administrador;

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
    return view('index');
});


//webpay
Route::get('/pagar', [CompraController::class, 'iniciar_compra'])->name( 'pagar');
Route::get('/pagar', [CompraController::class, 'iniciar_compra'])->name( 'pagar');
Route::match(['get', 'post'], '/confirmar_pago', [CompraController::class, 'confirmar_pago'])->name('confirmar_pago');

Route::get('/pagar', [CompraController::class, 'iniciar_compra'])->name( 'pagar');

Route::post('/webpay/return', 'CompraController@retorno_webpay')->name('retorno_webpay');

Route::get('/ola', [CompraController::class, 'residente'])->name( 'ola');

//De pruebita jiji
Route::get('/tabla', [TablaController::class, 'tablita'])->name( 'tabla');

//login
Route::get('/login', [LoginController::class, 'login'])->name( 'login');
Route::post('login-user', [LoginController::class, 'loginUsuario'])->name('login-user');

//admin

Route::get('/admin', [AdminController::class, 'admin'])->name( 'admin');

//residente
Route::get('/residente', [ResidenteController::class, 'vista'])->name( 'residente');
Route::get('/perfilresidente', [ResidenteController::class, 'perfil'])->name( 'perfilresidente');

Route::get('/exito', [PagoexitosoController::class, 'vista'])->name( 'exito');

//CRUD RESIDENTE
Route::Get('/create', [ResidenteController::class, 'create'])->name('create');
Route::get('/edit/{ID_RESIDENTE}', [ResidenteController::class, 'edit'])->name('edit');
Route::post('/update/{ID_RESIDENTE}', [ResidenteController::class, 'update'])->name('residente.update');
Route::post('/residente', [ResidenteController::class, 'store'])->name('residente.store');
Route::delete('/destroy/{ID_RESIDENTE}', [ResidenteController::class, 'destroy'])->name('destroy');
Route::get('/nuevoresidente', [ResidenteController::class, 'vista'])->name( 'nuevoresidente');

//Libro
Route::get('/libro', [LibroController::class, 'vista'])->name('libro.vista');
Route::get('/libro/create', [LibroController::class, 'create'])->name('libro.create');
Route::post('/libro', [LibroController::class, 'store'])->name('libro.store');
Route::post('/libro/update/{ID_LIBRO}', [LibroController::class, 'update'])->name('libro.update');
Route::delete('libro/destroy/{ID_LIBRO}', [LibroController::class, 'destroy'])->name('libro.destroy');


//RESERVA

Route::get('/reserva', [ReservaController::class, 'vista'])->name('reserva.vista');
Route::get('/reserva/create', [ReservaController::class, 'create'])->name('reserva.nuevareserva');
Route::post('/reserva', [ReservaController::class, 'store'])->name('reserva.store');
Route::post('/reserva/update/{ID_RESERVA}', [ReservaController::class, 'update'])->name('reserva.update');
Route::delete('reserva/destroy/{ID_RESERVA}', [ReservaController::class, 'destroy'])->name('reserva.destroy');

//ANUNCIO ADMIN

Route::get('/anuncio_administrador', [Anuncio_administradorController::class, 'vista'])->name('anuncio_administrador.vista');
Route::get('/anuncio_administrador/create', [Anuncio_administradorController::class, 'create'])->name('anuncioadmin.nuevoanuncio');
Route::post('/anuncio_administrador', [Anuncio_administradorController::class, 'store'])->name('anuncio_administrador.store');
Route::post('/anuncio_administrador/update/{ID_ANUNCIO_ADMIN}', [ResAnuncio_administradorControllerervaController::class, 'update'])->name('anuncio_administrador.update');
Route::delete('anuncio_administrador/destroy/{ID_ANUNCIO_ADMIN}', [Anuncio_administradorController::class, 'destroy'])->name('anuncio_administrador.destroy');



//ANUNCIO DIRECTIVA