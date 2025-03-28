<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'contenido' => 'required|string',
            'nombre_usuario' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'articulo_id' => 'required|exists:articulos,id',
        ];
    }

    public function messages()
    {
        return [
            'contenido.required' => 'El contenido es obligatorio.',
            'contenido.string' => 'El contenido debe ser un texto válido.',
            'nombre_usuario.required' => 'El nombre de usuario es obligatorio.',
            'nombre_usuario.string' => 'El nombre de usuario debe ser un texto.',
            'nombre_usuario.max' => 'El nombre de usuario no debe exceder los 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.max' => 'El correo electrónico no debe exceder los 255 caracteres.',
            'articulo_id.required' => 'El artículo es obligatorio.',
            'articulo_id.exists' => 'El artículo seleccionado no existe.',
        ];
    }
}
