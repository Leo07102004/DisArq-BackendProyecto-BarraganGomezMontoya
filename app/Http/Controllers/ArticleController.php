<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Factories\ThemeFactory; // Importa la fábrica
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Obtener artículo por tema utilizando Factory Method
     */
    public function getArticleByTheme($theme)
    {
        try {
            // Usa la fábrica para obtener el manejador correspondiente
            $handler = ThemeFactory::create($theme);
            $article = $handler->getArticle(); // Devuelve el primer artículo

            // Respuesta exitosa
            return response()->json([
                'success' => true,
                'message' => 'Artículo obtenido con éxito',
                'data' => $article
            ], 200);

        } catch (\Exception $e) {
            // Respuesta en caso de error
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el artículo',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
