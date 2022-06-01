<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroCaracteristicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_caracteristica', function (Blueprint $table) {
            $table->unsignedBigInteger('id_etiqueta');
            $table->unsignedBigInteger('id_libro');
            $table->primary(['id_etiqueta', 'id_libro']);
            $table->foreign('id_etiqueta')->references('id_etiqueta')->on('etiquetas');
            $table->foreign('id_libro')->references('id_libro')->on('libro');
            $table->string('valor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libro_caracteristica_asignacion');
    }
}
