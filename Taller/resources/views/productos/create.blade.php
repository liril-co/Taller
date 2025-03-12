@extends('layouts.app')

@section('title', 'Nuevo producto')

@section('content')
    <form method="POST" action="{{ route('producto.store') }}" class="producto_nuevo">
        @csrf
        <div class="img">
            <input type="url" name="imagen" id="url" placeholder="Url de la imagen del producto" autocomplete="off">
        </div>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto" autocomplete="off">
        <input type="text" name="descripcion" id="descripcion" placeholder="Descripción del producto" autocomplete="off">
        <input type="number" name="stock" id="stock" placeholder="En stock" autocomplete="off">
        <select name="categoria_id" id="categoria" autocomplete="off">
            <option value="null" selected disabled>Categoría</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
        <input type="number" name="precio" id="precio" placeholder="Precio del producto">
        <button>Agregar producto</button>
    </form>
    @if($errors->any())
        <div  class="errors">
            @foreach($errors->all() as $error)
                <p>{{  $error }}</p>
            @endforeach
        </div>
    @endif
@endsection