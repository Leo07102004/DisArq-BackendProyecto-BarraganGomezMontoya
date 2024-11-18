<?php

namespace Tests\Unit;

use App\Factories\ThemeFactory;
use App\Factories\SportsHandler;
use App\Factories\VideogamesHandler;
use App\Factories\CharactersHandler;
use App\Factories\FoodHandler;
use PHPUnit\Framework\TestCase;

class ThemeFactoryTest extends TestCase
{
    /** @test */
    public function it_creates_sports_handler_when_deportes_is_given()
    {
        $handler = ThemeFactory::create('Deportes');
        $this->assertInstanceOf(SportsHandler::class, $handler);
    }

    /** @test */
    public function it_creates_videogames_handler_when_videojuegos_is_given()
    {
        $handler = ThemeFactory::create('Videojuegos');
        $this->assertInstanceOf(VideogamesHandler::class, $handler);
    }

    /** @test */
    public function it_creates_characters_handler_when_personajes_is_given()
    {
        $handler = ThemeFactory::create('Personajes');
        $this->assertInstanceOf(CharactersHandler::class, $handler);
    }

    /** @test */
    public function it_creates_food_handler_when_comidas_is_given()
    {
        $handler = ThemeFactory::create('Comidas');
        $this->assertInstanceOf(FoodHandler::class, $handler);
    }

    /** @test */
    public function it_throws_exception_when_an_unsupported_theme_is_given()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Tema no soportado: UnsupportedTheme');
        
        ThemeFactory::create('UnsupportedTheme');
    }
}
