@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <form method="GET" action="{{ route('producto.index') }}" class="filtrar-productos">
        <label for="categoria">{{ __('messages.filterByCategory') }}</label>
        <select name="categoria" id="categoria" onchange="this.form.submit()">
            <option value="">{{ __('messages.all') }}</option>
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
                    <span class="precio">{{ $producto->precio }}</span>
                    <button title="{{ __('messages.addToCart') }}" class="agregar-compra">🛒</button>
                <div class="detalles">
                    <a href="{{ route('producto.show',  $producto) }}">{{ __('messages.seeDetails') }}</a>
                    @auth
                    <div class="actions">
                        <a href="{{ route('producto.edit', $producto) }}">
                            <button title="{{ __('messages.editProduct') }}">🖊</button>
                        </a>
                        <form action="{{ route('producto.delete',  $producto) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button title="{{ __('messages.deleteProduct') }}">🗑</button>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>

    <br>
    @auth
    <div class="nuevo-producto">
        <a href="{{ route('producto.create') }}">{{ __('messages.addNewProduct') }}</a>
    </div>
    @endauth

@endsection