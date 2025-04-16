<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;
use App\HTTP\Controllers\ProductoController;
use App\HTTP\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

// Rutas de productos (ya incluye index, create, store, edit, update, destroy)
Route::resource('productos', ProductoController::class)->middleware('auth')->except(['show']);

// Ruta de checkout
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('checkout/procesar', [CheckoutController::class, 'procesar'])->name('checkout.procesar');

// Rutas de administración
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Rutas del perfil de usuario
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

