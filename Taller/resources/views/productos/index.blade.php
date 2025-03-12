@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <form method="GET" action="{{ route('producto.index') }}" class="filtrar-productos">
        <label for="categoria">Filtrar por categoría:</label>
        <select name="categoria" id="categoria" onchange="this.form.submit()">
            <option value="">Todas</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </form>

    <div class="productos">
        @foreach ($productos as $producto)
            <div class="producto">
                <img src="{{ $producto->imagen }}" alt="">
                <h2>{{ $producto->nombre }}</h2>
                <div class="comprar">
                    <span class="precio">{{ $producto->precio }}</span>
                    <button title="Añadir al carrito" class="agregar-compra">🛒</button>
                </div>
                <div class="detalles">
                    <a href="{{ route('producto.show', $producto) }}">Ver detalles</a>
                    <div class="actions">
                        <a href="{{ route('producto.edit', $producto) }}">
                            <button title="Editar producto">🖊</button>
                        </a>
                        <form action="{{ route('producto.delete', $producto) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button title="Eliminar producto">🗑</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <br>
    <div class="nuevo-producto">
        <a href="{{ route('producto.create') }}">Añadir un nuevo producto</a>
    </div>

@endsection