<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAltasBajasEjemplaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('altas_bajas_ejemplares', function (Blueprint $table) {
            $table->id('id_alta');
            $table->unsignedBigInteger('id_libro');
            $table->foreign('id_libro')->references('id_libro')->on('libro');
            $table->integer('cantidad_ejemplares'); 
            $table->enum('tipo', ['ingreso', 'egreso']); 
            $table->enum('motivo', ['migracion', 'daño','donacion','compra']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('altas_bajas_ejemplares_caracteristica_asignacion');
    }
}
