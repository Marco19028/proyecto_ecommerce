<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito.index', compact('carrito'));
    }

    public function agregar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $carrito = session()->get('carrito', []);

        if(isset($carrito[$id])){
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen
            ];
        }

        session()->put('carrito', $carrito);
        return redirect()->back()->with('exito', 'Producto agregado al carrito');
    }

    public function eliminar(Request $request, $id)
    {
        $carrito = session()->get('carrito', []);
        if(isset($carrito[$id])){
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }
        return redirect()->back()->with('exito', 'Producto eliminado del carrito');
    }
}
