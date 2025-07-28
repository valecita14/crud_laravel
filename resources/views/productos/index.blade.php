@extends('layout')

@section('title', 'Lista de Productos')

@section('content')
    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Agregar Producto</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>
                        <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-warning">Editar</a>
                        
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay productos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
