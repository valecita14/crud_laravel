@extends('layout')

@section('title', 'Agregar Producto')

@section('content')

    {{-- ALERTA DE ÉXITO --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- FORMULARIO --}}
    <form action="{{ route('productos.store') }}" method="POST" class="card p-4 shadow-sm mt-3">
        @csrf

        {{-- CAMPO: Nombre --}}
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
            @error('nombre')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        {{-- CAMPO: Descripción --}}
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        {{-- CAMPO: Precio --}}
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio') }}" step="0.01" required>
            @error('precio')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
