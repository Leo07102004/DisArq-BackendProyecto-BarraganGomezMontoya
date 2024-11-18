<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'autor',
        'titulo',
        'tema',
        'contenido',
        'comentarios',
        'imagen',
    ];
}
