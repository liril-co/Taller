@extends('layouts.app')

@section('title', 'Nuevo artículo')

@section('content')
    <form method="POST" action="{{ route('articulo.store') }}" class="articulo_nuevo">
        @csrf
            <fieldset>
                <legend>Url de la imagen destacada del artículo</legend>
                <input type="url" name="imagen_destacada" id="url">
            </fieldset>
        <fieldset>
            <legend>Título del artículo</legend>
            <input type="text" name="titulo" id="titulo">
        </fieldset>
        <fieldset>
            <legend>Contenido del artículo</legend>
            <input type="text" name="contenido" id="contenido">
        </fieldset>
        <fieldset>
            <legend>Autor</legend>
            <input type="text" name="autor" id="autor">
        </fieldset>
        <fieldset>
            <legend>Categoría del blog</legend>
            <select name="categoria_blog_id" id="categoria-blog" autocomplete="off">
                <option value="null" selected disabled hidden>Seleccione una categoría</option>
                @foreach ($categoriasBlog as $categoriaBlog)
                    <option value="{{ $categoriaBlog->id }}">{{ $categoriaBlog->nombre }}</option>
                @endforeach
            </select>
        </fieldset>
        <fieldset>
            <legend>Fecha de publicación</legend>
            <input type="date" name="fecha_publicacion" id="fecha_publicacion">
        </fieldset>
        <button>Publicar artículo</button>
    </form>
    @if($errors->any())
        <div class="errors">
            @foreach($errors->all() as $error)
                <p>{{  $error }}</p>
            @endforeach
        </div>
    @endif
@endsection