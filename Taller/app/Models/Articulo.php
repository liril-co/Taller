<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'contenido',
        'imagen_destacada',
        'autor',
        'categoria_blog_id',
        'fecha_publicacion',
    ];

    public function categoriaBlog()
    {
        return $this->belongsTo(CategoriaBlog::class);
    }
}
