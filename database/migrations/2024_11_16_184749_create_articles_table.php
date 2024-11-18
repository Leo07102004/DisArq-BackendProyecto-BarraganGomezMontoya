<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('autor');
            $table->string('titulo');
            $table->string('tema'); //Puede ser "deportes", "videojuegos", "personajes", o "comidas"
            $table->text('contenido');
            $table->text('comentarios')->nullable();
            $table->string('imagen')->nullable(); //Almacena la ruta o nombre de archivo de la imagen
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
