<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;
use App\HTTP\Controllers\ProductoController;
use App\HTTP\Controllers\CheckoutController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

Route::resource('productos', ProductoController::class)->middleware('auth');

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('checkout/procesar', [CheckoutController::class, 'procesar'])->name('checkout.procesar');

Route::group(['middleware' => ['auth', 'esAdmin']], function () {
    Route::get('/admin/productos', [ProductoController::class, 'index'])->name('admin.productos.index');
    Route::get('/admin/productos/crear', [ProductoController::class, 'create'])->name('admin.productos.create');
    Route::post('/admin/productos', [ProductoController::class, 'store'])->name('admin.productos.store');
    Route::get('/admin/productos/{id}/editar', [ProductoController::class, 'edit'])->name('admin.productos.edit');
    Route::put('/admin/productos/{id}', [ProductoController::class, 'update'])->name('admin.productos.update');
    Route::delete('/admin/productos/{id}', [ProductoController::class, 'destroy'])->name('admin.productos.destroy');
    Route::resource('/admin/categorias', CategoriaController::class)->except(['show']);
    Route::resource('/admin/etiquetas', EtiquetaController::class)->except(['show']);
    Route::get('/admin/pedidos', [PedidoController::class, 'index'])->name('admin.pedidos.index');
    Route::get('/admin/pedidos/{id}', [PedidoController::class, 'show'])->name('admin.pedidos.show');
    Route::put('/admin/pedidos/{id}/estado', [PedidoController::class, 'actualizarEstado'])->name('admin.pedidos.estado');
    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.usuarios.index');
    Route::put('/admin/usuarios/{id}/rol', [UserController::class, 'actualizarRol'])->name('admin.usuarios.rol');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/reportes/ventas', [ReporteController::class, 'ventas'])->name('admin.reportes.ventas');
    Route::get('/admin/reportes/productos', [ReporteController::class, 'productos'])->name('admin.reportes.productos');
    Route::get('/admin/auditoria', [AuditoriaController::class, 'index'])->name('admin.auditoria.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
