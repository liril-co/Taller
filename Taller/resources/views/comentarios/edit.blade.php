@extends('layouts.app')

@section('title', 'Editar comentario')

@section('content')
    <form method="POST" action="{{ route('comentario.update', $comentario) }}" class="editar_comentario">
        @csrf
        @method('PATCH')
        <input type="hidden" name="articulo_id" value="{{ $comentario->articulo_id }}">
        <fieldset>
            <legend>Nombre del usuario</legend>
            <input value="{{ old('nombre_usuario', $comentario['nombre_usuario']) }}" type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre del usuario" autocomplete="off">
        </fieldset>
        <fieldset>
            <legend>Email del usuario</legend>
            <input value="{{ old('email', $comentario['email']) }}" type="email" name="email" id="email" placeholder="Email del usuario" autocomplete="off">
        </fieldset>
        <fieldset>
            <legend>Contenido del comentario</legend>
            <textarea name="contenido" id="contenido" placeholder="Contenido del comentario">{{ old('contenido', $comentario['contenido']) }}</textarea>
        </fieldset>
        <button>Guardar ediciones</button>
    </form>
    @if($errors->any())
        <div class="errors">
            @foreach($errors->all() as $error)
                <p>{{  $error }}</p>
            @endforeach
        </div>
    @endif
@endsection