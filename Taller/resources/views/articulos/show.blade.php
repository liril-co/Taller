@extends('layouts.app')

@section('title', $articulo->titulo)

@section('content')
<div class="articulo-show">
    <h2>{{ $articulo->titulo }}</h2>
    <p class="autor">{{ $articulo->autor }}</p>
    <p class="fecha-publicacion">{{ $articulo->fecha_publicacion }}</p>
    <p class="categoria">{{ $articulo->categoriaBlog->nombre }}</p>
    <p class="contenido">{{ $articulo->contenido }}</p>
    <img class="imagen-destacada" src="{{ $articulo->imagen_destacada }}" alt="{{ $articulo->titulo }}">
    <div class="actions">
        <a href="{{ route('articulo.edit', $articulo) }}">
            <button title="{{ __('messages.editArticle') }}">🖊</button>
        </a>
        <form action="{{ route('articulo.delete',  $articulo) }}" method="POST">
            @csrf
            @method('DELETE')
            <button title="{{ __('messages.deleteArticle') }}">🗑</button>
        </form>
    </div>
    <div class="comentarios">
        @foreach($articulo->comentarios as $comentario)
            <div class="comentario">
                <div class="info">
                    <span class="autor">{{ $comentario->nombre_usuario }}</span>
                    <span class="fecha">{{ $comentario->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <p class="contenido">{{ $comentario->contenido }}</p>
                <div class="acciones">
                    <a href="{{ route('comentario.edit', $comentario) }}">
                        <button title="{{ __('messages.editComment') }}">🖊</button>
                    </a>
                    <form action="{{ route('comentario.delete', $comentario) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button title="{{ __('messages.deleteComment') }}">🗑</button>
                    </form>
                </div>
            </div>
        @endforeach
        <div class="nuevo-comentario">
            <h3>{{ __('messages.leaveAComment') }}</h3>
            <form action="{{ route('comentario.store') }}" method="POST">
                @csrf
                <input type="hidden" name="articulo_id" value="{{ $articulo->id }}">
                <input type="text" name="nombre_usuario" placeholder="{{ __('messages.commentName') }}" required>
                <input type="email" name="email" placeholder="{{ __('messages.commentEmail') }}" required>
                <textarea name="contenido" placeholder="{{ __('messages.commentLeave') }}" required></textarea>
                <button type="submit">{{ __('messages.comment') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection