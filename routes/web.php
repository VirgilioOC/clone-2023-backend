<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'can:accessAnyone'])->group(function () {
    Route::get('/item', 'App\Http\Controllers\ItemController@index');
    Route::get('/item/{id}/edit', 'App\Http\Controllers\ItemController@edit');
    Route::post('/item/{id}', 'App\Http\Controllers\ItemController@update');
    Route::resource('pedido', 'App\Http\Controllers\PedidoController');
    Route::get('/tipo', 'App\Http\Controllers\TipoController@index');

    //Rutas solo accesibles por el admin
    Route::get('/item/create', 'App\Http\Controllers\ItemController@create')->middleware('can:accessOnlyAdmin');
    Route::post('/item', 'App\Http\Controllers\ItemController@store')->middleware('can:accessOnlyAdmin');
    Route::get('/tipo/create', 'App\Http\Controllers\TipoController@create')->middleware('can:accessOnlyAdmin');
    Route::post('/tipo', 'App\Http\Controllers\TipoController@store')->middleware('can:accessOnlyAdmin');
    Route::post('/item/{id}', 'App\Http\Controllers\ItemController@updateState')->name('item.update')->middleware('can:accessOnlyAdmin');
    Route::post('/tipo/{id}', 'App\Http\Controllers\TipoController@updateState')->name('tipo.update')->middleware('can:accessOnlyAdmin');
});

Route::get('/Item', function () {
    return view('item');
})->middleware(['auth', 'verified'])->name('item');

Route::get('/Pedido', function () {
    return view('pedido');
})->middleware(['auth', 'verified'])->name('pedido');

Route::get('/Tipo', function () {
    return view('tipo');
})->middleware(['auth', 'verified'])->name('tipo');

Route::get('/pedido/{id}/detalle', 'App\Http\Controllers\PedidoController@detalle');

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
