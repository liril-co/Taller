@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <div class="categorias">
        <table class="categorias">
            <thead>
                <tr>
                    <th>{{ __('messages.name') }}</th>
                    <th>{{ __('messages.description') }}</th>
                    <th>{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $categorias as $categoriaInstance)
                    @if ($categoriaInstance == $categoria)
                    <form method="POST" action="{{ route('categoria.update', $categoria) }}">
                        <tr>
                            @csrf
                            @method('PATCH')
                            <td><input value="{{ old('nombre', $categoriaInstance['nombre']) }}" type="text" name="nombre" id="nombre" placeholder="{{ __('messages.name') }}"></td>
                            <td><input value="{{ old('descripcion', $categoriaInstance['descripcion']) }}" type="text" name="descripcion" id="descripcion" placeholder="{{ __('messages.description') }}"></td>
                            <td>
                                <button title="{{ __('messages.acceptEditions') }}">✔</button>
                                <a href="{{ route('categoria.index') }}"><button type="button" title="{{ __('messages.discardEditions') }}">✖</button></a>
                            </td>
                        </tr>
                    </form>
                    @else
                        <tr>
                            <td>{{ $categoriaInstance->nombre }}</td>
                            <td>{{ $categoriaInstance->descripcion }}</td>
                            <td>
                                <a href="{{ route('categoria.edit', $categoriaInstance ) }}">
                                    <button title="{{ __('messages.editCategory') }}">🖊</button>
                                </a>
                                <form action="{{ route('categoria.delete', $categoriaInstance) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button title="{{ __('messages.deleteCategory') }}">🗑</button>
                                </form>
                            </td>
                        </tr>  
                    @endif
                        
                @endforeach
                <form method="POST" action="{{ route('categoria.store') }}">
                    @csrf
                    <tr>
                        <td><input type="text" name="nombre" id="nombre" placeholder="{{ __('messages.name') }}"></td>
                        <td><input type="text" name="descripcion" id="descripcion" placeholder="{{ __('messages.description') }}"></td>
                        <td>
                            <button title="{{ __('messages.addCategory') }}">➕</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
    @if($errors->any())
        <div  class="errors">
            @foreach($errors->all() as $error)
                <p>{{  $error }}</p>
            @endforeach
        </div>
    @endif
@endsection