<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        Article::create([
            'autor' => 'Confederación Deportiva Autónoma de Guatemala',
            'titulo' => 'Descubriendo el balonmano: Un deporte de dinámica y estrategia',
            'tema' => 'Deportes',
            'contenido' => 'El balonmano, un deporte apasionante y lleno de energía, que ha formado parte del programa de deportes olímpicos desde la edición de Berlín en 1936. Aunque muchos lo consideran un deporte de nicho, sus seguidores y practicantes saben que el balonmano es mucho más que eso: es un juego de estrategia, velocidad y destreza que cautiva a quienes se sumergen en él.
                            Es un deporte de conjunto que se juega con dos equipos de siete jugadores cada uno (seis jugadores de campo y un portero) en una cancha rectangular. El objetivo del juego es lanzar una pelota de balonmano en la portería del equipo contrario para anotar puntos.',
            'comentarios' => 'Para afiliarse a la práctica del balonmano, el máximo ente en la ciudad de Bogotá es la Liga de Balonmano de la ciudad que entrena regularmente en el PRD El Salitre',
            'imagen' => 'recursos\deportes1.jpg',
        ]);

        Article::create([
            'autor' => 'Softzone',
            'titulo' => '60 parsecs! una joya escondida',
            'tema' => 'Videojuegos',
            'contenido' => 'En este título, disponemos de 60 segundos antes de que explote la estación especial en la que nos encontramos para coger objetos o personas que queremos llevar en nuestra próxima aventura espacial liderando a otras personas que han tenido el mismo tiempo que nosotros por lo que tendremos que hacer todo lo posible para continuar nuestro viaje con lo puesto.',
            'comentarios' => 'Este juego se puede comprar en Eneba por alrededor de 25.000 COP',
            'imagen' => 'recursos\videojuegos1.jpg',
        ]);

        Article::create([
            'autor' => 'BBC',
            'titulo' => 'Boyan Slat y su propósito vital',
            'tema' => 'Personajes',
            'contenido' => 'Boyan Slat tiene 30 años y una meta definida: limpiar los océanos de basura plástica. Durante su adolescencia pasó horas tratando de buscar la mejor forma de hacerlo hasta que se le ocurrió cómo. ¿Pero puede realmente funcionar el sistema que inventó? El proyecto del joven consiste en atrapar la basura con unas barreras flotantes ancladas en el fondo del mar.',
            'comentarios' => 'Se invita a profundizar sobre la ONG de Boyan Slat "TheOceanCleanup"',
            'imagen' => 'recursos\personajes1.jpg',
        ]);

        Article::create([
            'autor' => 'Natruly',
            'titulo' => 'Sushi de quinoa una alternativa nutritiva',
            'tema' => 'Comidas',
            'contenido' => 'El sushi de quinoa es una fusión innovadora que combina ingredientes tradicionales con superalimentos modernos. Esta variación del sushi tradicional no solo es deliciosa, sino que también ofrece una opción más nutritiva y accesible para quienes buscan alternativas a la clásica dieta japonesa.',
            'comentarios' => 'En Bogotá se puede saborear esta preparación en el restaurante POKE TUNA QUINOA',
            'imagen' => 'recursos\comidas1.jpg',
        ]);
    }
}