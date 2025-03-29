@extends('layouts.app')

@section('title', 'Nuevo artículo')

@section('content')
    <form method="POST" action="{{ route('articulo.store') }}" class="articulo_nuevo">
        @csrf
            <fieldset>
                <legend>{{ __('messages.imageUrlArticle') }}</legend>
                <input type="url" name="imagen_destacada" id="url">
            </fieldset>
        <fieldset>
            <legend>{{ __('messages.ArticleTitle') }}</legend>
            <input type="text" name="titulo" id="titulo">
        </fieldset>
        <fieldset>
            <legend>{{ __('messages.ArticleContent') }}</legend>
            <input type="text" name="contenido" id="contenido">
        </fieldset>
        <fieldset>
            <legend>{{ __('messages.ArticleAutor') }}</legend>
            <input type="text" name="autor" id="autor">
        </fieldset>
        <fieldset>
            <legend>{{ __('messages.ArticleCategory') }}</legend>
            <select name="categoria_blog_id" id="categoria-blog" autocomplete="off">
                <option value="null" selected disabled hidden>{{ __('messages.ArticleCategorySelect') }}</option>
                @foreach ($categoriasBlog as $categoriaBlog)
                    <option value="{{ $categoriaBlog->id }}">{{ $categoriaBlog->nombre }}</option>
                @endforeach
            </select>
        </fieldset>
        <fieldset>
            <legend>{{ __('messages.ArticlePublication') }}</legend>
            <input type="date" name="fecha_publicacion" id="fecha_publicacion">
        </fieldset>
        <button>{{ __('messages.ArticlePublish') }}</button>
    </form>
    @if($errors->any())
        <div class="errors">
            @foreach($errors->all() as $error)
                <p>{{  $error }}</p>
            @endforeach
        </div>
    @endif
@endsection