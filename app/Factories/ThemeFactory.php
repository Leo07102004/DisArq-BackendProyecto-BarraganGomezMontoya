<?php

namespace App\Factories;

class ThemeFactory
{
    public static function create(string $theme): ThemeHandler
    {
        return match ($theme) {
            'Deportes' => new SportsHandler(),
            'Videojuegos' => new VideogamesHandler(),
            'Personajes' => new CharactersHandler(),
            'Comidas' => new FoodHandler(),
            default => throw new \Exception("Tema no soportado: $theme"),
        };
    }
}
