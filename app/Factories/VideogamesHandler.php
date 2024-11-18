<?php

namespace App\Factories;

use App\Models\Article;

class VideogamesHandler implements ThemeHandler
{
    public function getArticle()
    {
        return Article::where('tema', 'Videojuegos')->first();
    }
}
