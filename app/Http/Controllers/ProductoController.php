<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria', 'etiquetas')->paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
        abort(403, 'Acceso no autorizado');
    }
    $categorias = Categoria::all();
    $etiquetas = Etiqueta::all();
    return view('productos.create', compact('categorias', 'etiquetas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|max:2048'
        ]);

        $datos = $request->all();

        if($request->hasFile('imagen')){
            $path = $request->file('imagen')->store('imagenes_productos', 'public');
            $datos['imagen'] = $path;
        }

        $producto = Producto::create($datos);

        if($request->has('etiquetas')){
            $producto->etiquetas()->attach($request->etiquetas);
        }

        return redirect()->route('productos.index')->with('exito', 'Producto creado correctamente');
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        $etiquetas = Etiqueta::all();
        return view('productos.edit', compact('producto', 'categorias', 'etiquetas'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|max:2048'
        ]);

        $datos = $request->all();

        if($request->hasFile('imagen')){
            $path = $request->file('imagen')->store('imagenes_productos', 'public');
            $datos['imagen'] = $path;
        }

        $producto->update($datos);

        if($request->has('etiquetas')){
            $producto->etiquetas()->sync($request->etiquetas);
        }

        return redirect()->route('productos.index')->with('exito', 'Producto actualizado correctamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('exito', 'Producto eliminado correctamente');
    }
}