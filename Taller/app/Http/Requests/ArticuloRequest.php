<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen_destacada' => 'nullable|url',
            'autor' => 'required|string|max:255',
            'categoria_blog_id' => 'required|exists:categoria_blogs,id',
            'fecha_publicacion' => 'nullable|date',
        ];
    }

    /**
     * Obtiene los mensajes de error personalizados para la validación.
     */
    public function messages(): array
    {
        return [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.string' => 'El título debe ser una cadena de texto.',
            'titulo.max' => 'El título no puede exceder los 255 caracteres.',

            'contenido.required' => 'El contenido es obligatorio.',
            'contenido.string' => 'El contenido debe ser una cadena de texto.',

            'imagen_destacada.image' => 'La imagen destacada debe ser un archivo de imagen válido.',
            'imagen_destacada.max' => 'La imagen destacada no puede superar los 2MB.',

            'autor.required' => 'El autor es obligatorio.',
            'autor.string' => 'El autor debe ser una cadena de texto.',
            'autor.max' => 'El nombre del autor no puede exceder los 255 caracteres.',

            'categoria_blog_id.required' => 'La categoría es obligatoria.',
            'categoria_blog_id.exists' => 'La categoría seleccionada no es válida.',

            'fecha_publicacion.date' => 'La fecha de publicación debe ser una fecha válida.',
        ];
    }
}
