<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIItemController;
use App\Http\Controllers\APIClienteController;
use App\Http\Controllers\APIPedidoController;
use App\Http\Controllers\APITipoController;
use App\Http\Controllers\MercadoPagoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas públicas
Route::get('/items', [APIItemController::class, 'index']);
Route::get('/items/{id}', [APIItemController::class, 'show']);

Route::get('/tipos', [APITipoController::class, 'index']);
Route::get('/tipos/{id}', [APITipoController::class, 'show']);

Route::post('/clientes/login', [APIClienteController::class, 'login']);
Route::post('/clientes/register', [APIClienteController::class, 'register']);

//Rutas protegidas
Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('/clientes/pedidos', [APIClienteController::class, 'pedidosCliente']);
    Route::post('/clientes/logout', [APIClienteController::class, 'logout']);

    Route::post('/pedidos/chequeo', [APIPedidoController::class, 'chequeoDatosPedidoCliente']);
    Route::post('/pedidos', [APIPedidoController::class, 'store']);

    Route::post('/process-payment', [MercadoPagoController::class, 'processPayment']);
});