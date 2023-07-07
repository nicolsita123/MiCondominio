<?php

use App\Http\Controllers\CompraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/iniciar_compra', [CompraController::class, 'iniciar_compra'])->name('getCompra');
Route::post('/iniciar_compra', [CompraController::class, 'iniciar_compra'])->name('postCompra');
Route::get('/confirmar_pago', [CompraController::class, 'confirmar_pago'])->name('confirmar_pago');
Route::post('/confirmar_pago', [CompraController::class, 'confirmar_pago'])->name('confirmar_pago');