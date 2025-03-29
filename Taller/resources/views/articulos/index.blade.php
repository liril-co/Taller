@extends('layouts.app')

@section('title', 'Artículos')

@section('content')
    <div class="articulos">
        @forelse($articulos as $articulo)
            <article class="articulo">
                <h2>{{ $articulo->titulo }}</h2>
                <p>{{ $articulo->categoriaBlog->nombre }}</p>
                <div class="detalles">
                    <a href="{{ route('articulo.show',  $articulo) }}">{{ __('messages.read') }}</a>
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
                </div>
            </article>
        @empty
            <li>{{ __('messages.noArticles') }}</li>
        @endforelse
        {{ $articulos->links('pagination::bootstrap-4') }}
    </div>

    <br>
    <div class="nuevo-articulo">
        <a href="{{ route('articulo.create') }}">{{ __('messages.addArticle') }}</a>
    </div>

@endsection