<?php

namespace App\Factories;

use App\Models\Article;

class SportsHandler implements ThemeHandler
{
    public function getArticle()
    {
        return Article::where('tema', 'Deportes')->first();
    }
}
