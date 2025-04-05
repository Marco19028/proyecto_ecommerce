<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $carrito = session()->get('carrito', []);
        $subtotal = array_sum(array_map(function($item){ return $item['precio'] * $item['cantidad']; }, $carrito));
        $impuestos = $subtotal * 0.15;
        $total = $subtotal + $impuestos;
        return view('checkout.index', compact('carrito', 'subtotal', 'impuestos', 'total'));
    }

    public function procesar(Request $request)
    {
        $pedido = Pedido::create([
            'usuario_id' => auth()->id(), 
            'estado' => 'pendiente', 
            'total' => $this->calcularTotal(), 
            'direccion_envio' => $request->direccion_envio,
            'metodo_pago' => $request->metodo_pago,
        ]);
    
        foreach (session('carrito', []) as $productoId => $detalle) {
            PedidoItem::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $productoId,
                'cantidad' => $detalle['cantidad'],
                'precio_unitario' => $detalle['precio'],
            ]);
        }
        session()->forget('carrito');

        return redirect()->route('productos.index')->with('exito', 'Compra realizada con éxito');
    }
}
