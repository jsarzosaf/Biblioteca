<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro', function (Blueprint $table) {
            $table->id('id_libro');
            $table->string('ISBN',15);
            $table->string('titulo',30);
            $table->string('subtitulo',20);
            $table->char('estado', 255);
            $table->string('version',20); 
            $table->integer('numero_ejemplares'); 
            $table->date('fecha_elaborado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libro');
    }
}
