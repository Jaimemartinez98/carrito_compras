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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/productos', [App\Http\Controllers\ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/edit/{id}', [App\Http\Controllers\ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/productos/update/{id}', [App\Http\Controllers\ProductosController::class, 'update'])->name('productos.update');
Route::delete('/productos/delete/{id}', [App\Http\Controllers\ProductosController::class, 'delete'])->name('productos.delete');

Route::get('/ventas', [App\Http\Controllers\VentasController::class, 'index'])->name('ventas.index');
Route::get('/ventas/create', [App\Http\Controllers\VentasController::class, 'create'])->name('ventas.create');
Route::post('/ventas/store', [App\Http\Controllers\VentasController::class, 'store'])->name('ventas.store');
Route::get('/ventas/edit/{id}', [App\Http\Controllers\VentasController::class, 'edit'])->name('ventas.edit');
Route::put('/ventas/update', [App\Http\Controllers\VentasController::class, 'update'])->name('ventas.update');
Route::delete('/ventas/delete/{id}', [App\Http\Controllers\VentasController::class, 'delete'])->name('ventas.delete');
Route::get('/ventas/show', [App\Http\Controllers\VentasController::class, 'show'])->name('ventas.show');
