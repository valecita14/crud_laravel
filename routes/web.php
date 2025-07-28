<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

// Redirige la raíz al listado de productos
Route::get('/', function () {
    return redirect()->route('productos.index');
});

// Rutas para el CRUD de productos
Route::resource('productos', ProductoController::class);
