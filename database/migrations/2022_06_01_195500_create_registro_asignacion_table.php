<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_asignacion', function (Blueprint $table) {
            $table->id('id_registro');
            $table->unsignedBigInteger('id_libro');
            $table->foreign('id_libro')->references('id_libro')->on('libro');
            $table->date('fecha_solicitud');
            $table->date('fecha_asignacion');
            $table->date('fecha_entrega');
            $table->string('user_solicitud',50);
            $table->string('user_prestamo',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_asignacion');
    }
}
