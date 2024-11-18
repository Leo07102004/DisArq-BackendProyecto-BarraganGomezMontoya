<?php

namespace App\Factories;

use App\Models\Article;

class FoodHandler implements ThemeHandler
{
    public function getArticle()
    {
        return Article::where('tema', 'Comidas')->first();
    }
}
