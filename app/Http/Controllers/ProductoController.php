<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    // Mostrar formulario para crear un nuevo producto
    public function create()
    {
        return view('productos.create');
    }

    // Guardar nuevo producto
    public function store(Request $request)
    {
   $request->validate([
    'nombre' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'],
    'descripcion' => ['nullable', 'string', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s.,\-()¡!¿?]+$/'],
    'precio' => ['required', 'numeric', 'gt:0'],
], [
    'nombre.required' => 'El nombre es obligatorio.',
    'nombre.regex' => 'El nombre no debe contener números ni símbolos.',
    'descripcion.regex' => 'La descripción no debe contener números.',
    'precio.required' => 'El precio es obligatorio.',
    'precio.numeric' => 'El precio debe ser un número.',
    'precio.gt' => 'El precio debe ser mayor que cero.',
]);



        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    // Mostrar formulario para editar un producto
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Actualizar un producto
    public function update(Request $request, Producto $producto)
    {
    $request->validate([
    'nombre' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'],
    'descripcion' => ['nullable', 'string', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s.,\-()¡!¿?]+$/'],
    'precio' => ['required', 'numeric', 'gt:0'],
], [
    'nombre.required' => 'El nombre es obligatorio.',
    'nombre.regex' => 'El nombre no debe contener números ni símbolos.',
    'descripcion.regex' => 'La descripción no debe contener números.',
    'precio.required' => 'El precio es obligatorio.',
    'precio.numeric' => 'El precio debe ser un número.',
    'precio.gt' => 'El precio debe ser mayor que cero.',
]);


        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado');
    }

    // Eliminar un producto
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado');
    }
}
